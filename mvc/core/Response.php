<?php
class Response
{
    protected $_url = WEB_ROOT;
    public function redirect($url)
    {
        if (preg_match("~^(http|https)~i", $url)) {
            $this->_url = $url;
        } else {
            $this->_url = $this->_url . "/" . $url;
        }
        header('Location: ' . $this->_url);
        exit;
    }
}