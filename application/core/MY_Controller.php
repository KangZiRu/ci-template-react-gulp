<?php defined('BASEPATH') OR die('No direct script access is allowed!');


class MY_Controller extends CI_Controller
{
    private $css = array();
    private $js = array();
    private $another_templates = array();
    private $template_location = 'before';
    private $header = 'header';
    private $footer = 'footer';
    private $page_title = '';


    public function __construct()
    {
        parent::__construct();
    }


    public function load_view($page, $data=array())
    {
        $this->is_page_exists($page);

        $data['header'] = $this->header;
        $data['footer'] = $this->footer;

        $data['css'] = $this->css;
        $data['js'] = $this->js;

        if ( ! isset($data['title']))
        {
            if ($this->page_title === '')
            {
                $data['title'] = ucfirst($page);
            }
            else
            {
                $data['title'] = $this->page_title;
            }

        }

        $data['title'] =
             $this->config->item('title_prefix')
                .$data['title']
                .$this->config->item('title_suffix');

        $data['version_query'] = '?v='.$this->config->item('app_version');

        $data['template'] = $this->another_templates;
        $data['template_location'] = $this->template_location;

        $this->load->view('templates/header.inc.php', $data);

        $this->load->view($page);

        $this->load->view('templates/footer.inc.php', $data);

        return $this;
    }


    public function load_css($css)
    {
        $type = gettype($css);
        if ($type == 'string')
        {
            array_push($this->css, $css);
        }
        else if ($type == 'array')
        {
            $this->css = array_merge($this->css, $css);
        }

        return $this;
    }


    public function load_js($js)
    {
        $type = gettype($js);
        if ($type == 'string')
        {
            array_push($this->js, $js);
        }
        else if ($type == 'array')
        {
            $this->js = array_merge($this->js, $js);
        }

        return $this;
    }


    public function load_react($js)
    {
        $type = gettype($js);
        if ($type == 'string')
        {
            $this->load_js('react/'.$js);
        }
        else if ($type == 'array')
        {
            foreach ($js as $jsfile)
            {
                $this->load_js('react/'.$jsfile);
            }
        }

        return $this;
    }


    public function exclude_header()
    {
        $this->header = FALSE;
        return $this;
    }


    public function exclude_footer()
    {
        $this->footer = FALSE;
        return $this;
    }


    public function body_only()
    {
        $this->exclude_header()
             ->exclude_footer();

        return $this;
    }


    public function set_header($header)
    {
        $this->header = $header;
        return $this;
    }


    public function set_footer($footer)
    {
        $this->footer = $footer;
        return $this;
    }


    public function set_title($page_title)
    {
        $this->page_title = $page_title;
        return $this;
    }


    public function include_template($template, $include_position='before')
    {
        $t_template = gettype($template);
        if ($t_template === 'array')
        {
            array_merge($this->another_templates, $template);
        }
        else
        {
            $this->another_templates[] = $template;
        }

        $this->template_location = $include_position;
        return $this;
    }


    /**
     * Send error message as AJAX
     *
     * @param string Error detail
     * @param optional Error code
     *
     * @return void
     */
    protected function send_error($error_string, $error_code=NULL)
    {
        $array = array();
        if (is_null($error_code))
        {
            $array['error'][] = $error_string;
        }
        else
        {
            $array['error'][$error_code] = $error_string;
        }

        echo json_encode($array);
    }


    private function is_page_exists($page)
    {
        if ( ! file_exists(APPPATH.'/views/'.$page.'.php'))
        {
            show_404();
        }
    }


    private function load_template($data)
    {
        foreach ($this->another_templates as $template)
        {
            $this->load->view($template, $data);
        }
    }
}
