<?php

class RobotsTxt
{

    private $robots = ""; //savesrobots.txt
    private $robots_branches = array(); //saves branches by user_agent
    private $url = "";

    /**
        @url - website url
     */
    public function __construct($url)
    {
        $this->url = $url;
        $this->robots = trim(file_get_contents($this->url . "/robots.txt"));

        $this->robots_branches = explode("User-agent: ", $this->robots);

        foreach ($this->robots_branches as $key => $robot) {
            $robot = trim($robot);
        }
    }

    /**
        Getting robots rules "branches"
     */
    public function get_robots_branches()
    {
        return $this->robots_branches;
    }

    /**
        return $this->robots
     */
    public function get_robots()
    {
        return $this->robots;
    }

    /**
        return sitemap by robots.txt
     */
    public function get_sitemap()
    {
        $search = "Sitemap:";
        $replace = "";
        $count = 1;

        $sitemap = substr($this->robots, strpos($this->robots, "Sitemap"));
        $sitemap = trim(str_replace($search, $replace, $sitemap, $count));

        return $sitemap;
    }

    /**
        return site url
     */
    public function get_url()
    {
        return $this->url;
    }

    /**
        check folder "assets" and create if scandir == false
     */
    public function check_assets_dir()
    {
        if (!scandir("./assets")) {
            mkdir("assets");
        } else return;
    }

    /**
        @dest - destination folder to saving sitemap.xml
        Saving sitemap.xml into dest folder
     */
    public function save_sitemap()
    {
        $this->check_assets_dir();
        copy($this->get_sitemap(), "./assets/sitemap.xml");
    }

    /**
        @dest - destination folder to saving sitemap.xml
        Saving robots.txt into dest folder
     */
    public function save_robots()
    {
        $this->check_assets_dir();
        copy($this->get_url() . "/robots.txt", "./assets/robots.txt");
    }

    /**
        @user_agent - name of necessary  bot
        Getting all disalows by necessary  user-agent bot
     */
    public function get_disallows_by_user_agent($user_agent)
    {
        $disalow = "";

        foreach ($this->robots_branches as $key => $value) {
            if (strstr($value, $user_agent)) {
                $disalow = $value;
                break;
            }
        }

        $disalow = trim(str_replace($user_agent, "", $disalow));
        $disalow = explode("Disallow:", $disalow);

        array_shift($disalow);

        if ($needle_pos = strpos($disalow[count($disalow) - 1], "Clean-param")) {
            $none_length = strlen($disalow[count($disalow) - 1]);
            $disalow[count($disalow) - 1] = substr_replace(
                $disalow[count($disalow) - 1],
                "",
                $needle_pos,
                $none_length - $needle_pos
            );
        }

        return $disalow;
    }

    /**
        Return host
     */
    public function get_host()
    {
        foreach ($this->robots_branches as $key => $robot) {
            if ($host_pos = strpos($robot, "Host:")) {
                $host = trim(mb_strcut($robot, $host_pos));
            }
        }

        return $host;
    }
}