<?php

class MetaBoxPostSelected
{

    public function __construct()
    {
        add_action('add_meta_boxes_post', array($this, 'nss_box_post_selected'));

        add_action('save_post', array($this, 'nss_save_salient_post'));
    }

    public function nss_box_post_selected()
    {
        add_meta_box(
            'nss-post-selected',
            'Select this post as Salient Post',
            array($this, 'nss_show_box_post_selected')
        );
    }


    public function nss_show_box_post_selected($post)
    {
        $post_id = $post->ID;
        $isChecked = get_post_meta($post_id, KEY_META_BOX_SALIENT_POST, true);

        $html = '<label for="box-salient-post" style="margin-right: 10px">Salient Post:</label>';
        $html .= '<input name="box-salient-post" type="checkbox"';
        $html .= $isChecked ? 'checked />' : '/>';

        echo $html;
    }


    public function nss_save_salient_post($post_id)
    {

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        $isChecked = isset($_REQUEST['box-salient-post']) ? true : false;

        update_post_meta($post_id, KEY_META_BOX_SALIENT_POST, $isChecked);
    }

}

return new MetaBoxPostSelected();