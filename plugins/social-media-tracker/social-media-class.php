<?php 

class socialMedia {

    public function __construct(){
        add_action('init', $this, array(grab_twitter_activity()));
    }
    public function generate_email_report(){
        
    }
    public function generate_csv_report(){

    }
    public function generate_sms_report(){

    }
    public function grab_twitter_activity(){
        var_dump('test');die();

    }
    public function grab_facebook_data(){

    }
    public function grab_instagram_data(){

    }
}