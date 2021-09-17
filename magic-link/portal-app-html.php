<?php
$post_id = $this->parts["post_id"];
$post = DT_Posts::get_post( $this->post_type, $post_id, true, false );
if ( is_wp_error( $post ) ){
    return;
}
$fields = DT_Posts::get_post_field_settings( $this->post_type );
?>


<div id="custom-style"></div>
<!-- title -->
<div class="grid-x">
    <div class="cell padding-1" >
        <button type="button" style="margin:1em;" data-open="offCanvasLeft"><i class="fi-list" style="font-size:2em;"></i></button>
        <span class="loading-spinner" style="float:right;margin:10px;"></span><!-- javascript container -->
    </div>
</div>

<!-- off canvas menus -->
<div class="off-canvas-wrapper">
    <!-- Left Canvas -->
    <div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas data-transition="push">
        <button class="close-button" aria-label="Close alert" type="button" data-close>
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="grid-x grid-padding-x center">
            <div class="cell " style="padding-top: 1em;"><h2><?php echo esc_html( $post['title'] ?? '' ) ?></h2></div>
            <div class="cell"><hr></div>
            <div class="cell"><a href="<?php echo site_url() . '/' . $this->parts['root'] . '/' . $this->parts['type'] . '/' . $this->parts['public_key'] . '/groups' ?>"><h3>Groups</h3></a></div>
            <div class="cell"><a href="<?php echo site_url() . '/' . $this->parts['root'] . '/' . $this->parts['type'] . '/' . $this->parts['public_key'] . '/people' ?>"><h3>People</h3></a></div>
            <div class="cell"><a href="<?php echo site_url() . '/' . $this->parts['root'] . '/' . $this->parts['type'] . '/' . $this->parts['public_key'] . '/map' ?>"><h3>Maps</h3></a></div>
            <div class="cell"><a href="<?php echo site_url() . '/' . $this->parts['root'] . '/' . $this->parts['type'] . '/' . $this->parts['public_key'] . '/pace' ?>"><h3>Pace</h3></a></div>
        </div>
    </div>
</div>

<div id="wrapper"></div>

<div class="dd" id="domenu">
    <button class="dd-new-item">+</button>
    <!-- .dd-item-blueprint is a template for all .dd-item's -->
    <li class="dd-item-blueprint">
        <div class="dd-handle dd3-handle">Drag</div>
        <div class="dd3-content"> <span>[item_name]</span>
            <button class="item-remove">&times;</button>
            <div class="dd-edit-box" style="display: none;">
                <input type="text" name="title" placeholder="name">
                <input type="url" name="http" placeholder="http://">
                <i>&#x270e;</i> </div>
        </div>
    </li>
    <ol class="dd-list">
    </ol>
</div>

<script>
    jQuery(document).ready(function(){
        $('#domenu').domenu({
            data: '[{"id":1,"title":"Item 1","http":""}]'
        })
    })
</script>
<style type="text/css">
    .cf:after {
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0;
    }

    * html .cf { zoom: 1; }

    *:first-child+html .cf { zoom: 1; }

    html {
        margin: 0;
        padding: 0;
    }

    body {
        font-size: 100%;
        margin: 0;
        font-family: 'Helvetica Neue', Arial, sans-serif;
    }

    h1 {
        font-size: 1.75em;
        margin: 0 0 0.6em 0;
    }

    a { color: #2996cc; }

    a:hover { text-decoration: none; }

    p { line-height: 1.5em; }

    .small {
        color: #666;
        font-size: 0.875em;
    }

    .large { font-size: 1.25em; }

    /**
         * Nestable
         */

    .dd {
        position: relative;
        display: block;
        margin: 0;
        padding: 0;
        max-width: 600px;
        list-style: none;
        font-size: 13px;
        line-height: 20px;
    }

    .dd-edit-box input {
        border: none;
        background: transparent;
        outline: none;
        font-size: 13px;
        color: #444;
        text-shadow: 0 1px 0 #fff;
        width: 45%;
    }

    .dd-edit-box { position: relative; }

    .dd-edit-box i {
        right: 0;
        overflow: hidden;
        cursor: pointer;
        position: absolute;
    }

    .dd-item-blueprint { display: none; }

    .dd-list {
        display: block;
        position: relative;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .dd-list .dd-list { padding-left: 30px; }

    .dd-collapsed .dd-list { display: none; }

    .dd-item,  .dd-empty,  .dd-placeholder {
        text-shadow: 0 1px 0 #fff;
        display: block;
        position: relative;
        margin: 0;
        padding: 0;
        min-height: 20px;
        font-size: 13px;
        line-height: 20px;
    }

    .dd-handle {
        cursor: move;
        display: block;
        height: 30px;
        margin: 5px 0;
        padding: 5px 10px;
        color: #333;
        text-decoration: none;
        font-weight: bold;
        border: 1px solid #AAA;
        background: #E74C3C;
        background: -webkit-linear-gradient(top, #E74C3C 0%, #C0392B 100%);
        background: -moz-linear-gradient(top, #E74C3C 0%, #C0392B 100%);
        background: linear-gradient(top, #E74C3C 0%, #C0392B 100%);
        -webkit-border-radius: 3px;
        border-radius: 3px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .dd-handle:hover {
        color: #2ea8e5;
        background: #fff;
    }

    .dd-item > button {
        display: inline-block;
        position: relative;
        cursor: pointer;
        float: left;
        width: 24px;
        height: 20px;
        margin: 5px 5px 5px 30px;
        padding: 0;
        white-space: nowrap;
        overflow: hidden;
        border: 0;
        background: transparent;
        font-size: 12px;
        line-height: 1;
        text-align: center;
        font-weight: bold;
        color: f black;
    }

    .dd-item .item-remove {
        position: absolute;
        right: 7px;
        height: 19px;
        padding: 0 5px;
        top: 6px;
        overflow: auto;
    }

    .dd3-item > button:first-child { margin-left: 30px; }

    .dd-item > button:before {
        display: block;
        position: absolute;
        width: 100%;
        text-align: center;
        text-indent: 0;
    }

    .dd-placeholder,  .dd-empty {
        margin: 5px 0;
        padding: 0;
        min-height: 30px;
        background: #f2fbff;
        border: 1px dashed #b6bcbf;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .dd-empty {
        border: 1px dashed #bbb;
        min-height: 100px;
        background-color: #e5e5e5;
        background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),  -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-image: -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),  -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-image: linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),  linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-size: 60px 60px;
        background-position: 0 0, 30px 30px;
    }

    .dd-dragel {
        height: 60px;
        position: absolute;
        pointer-events: none;
        z-index: 9999;
    }

    .dd-dragel > .dd-item .dd-handle { margin-top: 0; }

    .dd-dragel .dd-handle {
        -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
        box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
    }

    /**
         * Nestable Draggable Handles
         */

    .dd3-content {
        display: block;
        height: 30px;
        margin: 5px 0;
        padding: 5px 10px 5px 40px;
        color: #333;
        text-decoration: none;
        font-weight: bold;
        border: 1px solid #ccc;
        border: 1px solid #898989;
        background: #fafafa;
        background: -webkit-linear-gradient(top, #F4F4F4 10%, #C9C9C9 100%);
        background: -moz-linear-gradient(top, #F4F4F4 10%, #C9C9C9 100%);
        background: linear-gradient(top, #F4F4F4 10%, #C9C9C9 100%);
        -webkit-border-radius: 3px;
        border-radius: 3px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .dd3-content:hover {
        color: #2ea8e5;
        background: #E74C3C;
        background: -webkit-linear-gradient(top, #E5E5E5 10%, #FFFFFF 100%);
        background: -moz-linear-gradient(top, #E5E5E5 10%, #FFFFFF 100%);
        background: linear-gradient(top, #E5E5E5 10%, #FFFFFF 100%);
    }

    .dd-dragel > .dd3-item > .dd3-content { margin: 0; }

    .dd3-handle {
        position: absolute;
        margin: 0;
        left: 0;
        top: 0;
        cursor: move;
        width: 30px;
        text-indent: 100%;
        white-space: nowrap;
        overflow: hidden;
        bold;
        border: 1px solid #807B7B;
        text-shadow: 0 1px 0 #807B7B;
        background: #E74C3C;
        background: -webkit-linear-gradient(top, #E74C3C 0%, #C0392B 100%);
        background: -moz-linear-gradient(top, #E74C3C 0%, #C0392B 100%);
        background: linear-gradient(top, #E74C3C 0%, #C0392B 100%);
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .dd3-handle:before {
        content: '≡';
        display: block;
        position: absolute;
        left: 0;
        top: 3px;
        width: 100%;
        text-align: center;
        text-indent: 0;
        color: #fff;
        font-size: 20px;
        font-weight: normal;
    }

    .dd3-handle:hover {
        background: #E74C3C;
        background: -webkit-linear-gradient(top, #E74C3C 0%, #C0392B 100%);
        background: -moz-linear-gradient(top, #E74C3C 0%, #C0392B 100%);
        background: linear-gradient(top, #E74C3C 0%, #C0392B 100%);
    }
</style>
