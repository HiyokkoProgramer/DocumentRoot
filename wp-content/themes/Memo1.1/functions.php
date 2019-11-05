<?php

/**カスタムメニューを有効化する**/
add_theme_support('menus');

register_nav_menus();

//サイドバーウィジェット//
register_sidebar(array(
    'name'=>'widget-red',
    'id'=>'sidebar-widget12',
    'description'=>'赤の見出しです。',
    'before_widget'=>'<div class="widget12">',
    'after_widget'=>'</div>',
    'before_title'=>'<h4 class="red">',
    'after_title'=>'</h4>',
));

register_sidebar(array(
    'name'=>'widget-orange',
    'id'=>'sidebar-widget6',
    'description'=>'オレンジの見出しです。',
    'before_widget'=>'<div class="widget6">',
    'after_widget'=>'</div>',
    'before_title'=>'<h4 class="orange">',
    'after_title'=>'</h4>',
));

register_sidebar(array(
    'name'=>'widget-brightyellow',
    'id'=>'sidebar-widget5',
    'description'=>'山吹色の見出しです。',
    'before_widget'=>'<div class="widget5">',
    'after_widget'=>'</div>',
    'before_title'=>'<h4 class="brightyellow">',
    'after_title'=>'</h4>',
));

register_sidebar(array(
    'name'=>'widget-remonyellow',
    'id'=>'sidebar-widget11',
    'description'=>'黄色の見出しです。',
    'before_widget'=>'<div class="widget11">',
    'after_widget'=>'</div>',
    'before_title'=>'<h4 class="remonyellow">',
    'after_title'=>'</h4>',
));

register_sidebar(array(
    'name'=>'widget-olive',
    'id'=>'sidebar-widget9',
    'description'=>'オリーブの見出しです。',
    'before_widget'=>'<div class="widget9">',
    'after_widget'=>'</div>',
    'before_title'=>'<h4 class="olive">',
    'after_title'=>'</h4>',
));

register_sidebar(array(
    'name'=>'widget-deepgreen',
    'id'=>'sidebar-widget10',
    'description'=>'深緑の見出しです。',
    'before_widget'=>'<div class="widget10">',
    'after_widget'=>'</div>',
    'before_title'=>'<h4 class="deepgreen">',
    'after_title'=>'</h4>',
));


//サイドバーウィジェット１//
register_sidebar(array(
    'name'=>'widget-mintgreen',
    'id'=>'sidebar-widget1',
    'description'=>'ミントグリーンの見出しです。',
    'before_widget'=>'<div class="widget1">',
    'after_widget'=>'</div>',
    'before_title'=>'<h4>',
    'after_title'=>'</h4>',

));

//サイドバーウィジェット２//
register_sidebar(array(
    'name'=>'widget-rightblue',
    'id'=>'sidebar-widget2',
    'description'=>'水色の見出しです。',
    'before_widget'=>'<div class="widget2">',
    'after_widget'=>'</div>',
    'before_title'=>'<h4 class="rightblue">',
    'after_title'=>'</h4>',
));

register_sidebar(array(
    'name'=>'widget-blue',
    'id'=>'sidebar-widget7',
    'description'=>'青の見出しです。',
    'before_widget'=>'<div class="widget7">',
    'after_widget'=>'</div>',
    'before_title'=>'<h4 class="blue">',
    'after_title'=>'</h4>',
));

register_sidebar(array(
    'name'=>'widget-parple',
    'id'=>'sidebar-widget3',
    'description'=>'紫の見出しです。',
    'before_widget'=>'<div class="widget3">',
    'after_widget'=>'</div>',
    'before_title'=>'<h4 class="parple">',
    'after_title'=>'</h4>',
));

register_sidebar(array(
    'name'=>'widget-pink',
    'id'=>'sidebar-widget4',
    'description'=>'ピンクの見出しです。',
    'before_widget'=>'<div class="widget4">',
    'after_widget'=>'</div>',
    'before_title'=>'<h4 class="pink">',
    'after_title'=>'</h4>',
));

register_sidebar(array(
    'name'=>'widget-magenta',
    'id'=>'sidebar-widget8',
    'description'=>'マゼンタの見出しです。',
    'before_widget'=>'<div class="widget8">',
    'after_widget'=>'</div>',
    'before_title'=>'<h4 class="magenta">',
    'after_title'=>'</h4>',
));


//フッター左ウィジェット//
register_sidebar(array(
    'name'=>'footer_left',
    'id'=>'footer_left',
    'description'=>'フッターの左に入れたいウィジェットはここに追加',
    'before_widget'=>'<div class="footer_widget_left_area">',
    'after_widget'=>'</div>',
    'before_title'=>'<h2>',
    'after_title'=>'</h2>',
));

//フッター中ウィジェット//
register_sidebar(array(
    'name'=>'footer_center',
    'id'=>'footer_center',
    'description'=>'フッターの真ん中に入れたいウィジェットはここに追加',
    'before_widget'=>'<div class="footer_widget_center_area">',
    'after_widget'=>'</div>',
    'before_title'=>'<h2>',
    'after_title'=>'</h2>',
));

//フッター右ウィジェット//
register_sidebar(array(
    'name'=>'footer_right',
    'id'=>'footer_right',
    'description'=>'フッターの右に入れたいウィジェットはここに追加',
    'before_widget'=>'<div class="footer_widget_right_area">',
    'after_widget'=>'</div>',
    'before_title'=>'<h2>',
    'after_title'=>'</h2>',
));


//関連記事//
function relation_posts(){
    $cat =get_queried_object_id();
    $data =[
        'period'     =>30,
        'post_type'    =>'any'
    ];

    $ranking_data = sga_ranking_get_date($data);
    if ( !empty( $ranking_data ) ) {
        foreach ( $ranking_data as $post_id ) {
            echo '<li><a href="' . esc_attr(get_permalink($post_id)) . '">' . esc_html(get_the_title($post_id)) . '</a></li>';
        }
    }
}


/**
 *  pagenation
 **/
function pagenation($limit = NULL, $post_typed = 'posts') {
    global $wp_rewrite;
    global $paged;
    global $wp_query;

    // 検索条件
    $query = array();
    if ($limit != NULL) {
        $query['posts_per_page'] = $limit;
    }

//    var_dump($wp_query);

    if (count($query) != 0) {
        $wp_query->query($query);
    }

    $wp_query->query(array(
        'post_type' => $post_typed,
    ));
    $paginate_base = get_pagenum_link();

    if( strpos( $paginate_base, '?' ) || !$wp_rewrite->using_permalinks() ) {
        $paginate_format = '';
        $paginate_base = add_query_arg( 'paged', '%#%' );
    } else {
        $paginate_format = (substr( $paginate_base, -1, 1 ) == '/' ? '' : '/') . user_trailingslashit('page/%#%/','paged');
        $paginate_base .= '%_%';
    }


    if( $paged < 2 ) {
        $paged = 1;
    }
    $args = array(
        'base' => $paginate_base,
        'format' => $paginate_format,
        'total' => $wp_query->max_num_pages,
        'current' => $paged,
        'show_all' => false,
        'prev_next' => true,
        'prev_text' => '&laquo;',
        'next_text' => '&raquo;',
        'type' => 'array',
    );
    $pagenate_array = paginate_links($args);

    // 配列がある場合のみ
    if (is_array($pagenate_array) == TRUE) {
        $pagenate .= '<div class="wp-pagenavi">';
        foreach ($pagenate_array as $key => $value) {

            if (preg_match('/current/', $value) == TRUE) {
                $class = '';
            }
            else {
                $class = '';
            }

            // $value = "<span class=\"{$class}\">".$value.'</span>';
            // リンク追加
            $pagenate .= $value;
        }

        $pagenate .= '</div>';
        echo $pagenate;
    }
}


////固定ページにカテゴリ表示//
add_action('init','add_categories_for_pages');
function add_categories_for_pages(){
    register_taxonomy_for_object_type('category', 'page');
}
add_action( 'pre_get_posts', 'nobita_merge_page_categories_at_category_archive' );
function nobita_merge_page_categories_at_category_archive( $query ) {
    if ( $query->is_category== true && $query->is_main_query() ) {
        $query->set('post_type', array( 'post', 'page', 'nav_menu_item'));
    }
}


//画像タップで拡大//
add_filter( 'image_send_to_editor', 'image_lity', 10 );

function image_lity( $html ){
    $html = preg_replace( '/a href=/', 'a data-lity href=', $html );
    return $html;
}


//アイキャッチ画像//
add_theme_support( 'post-thumbnails' );


//パンくずリスト//
function the_breadcrumb(){
    global $post;
    $query_obj = get_queried_object();        //オブジェクト取得
    $query_obj_id = get_queried_object_id();  //オブジェクトIDの取得
    $name = $query_obj->name;                 //オブジェクト名の取得
    $slug = $query_obj->slug;                 //スラッグ名の取得
    $str ='';
    $breadcrumb ='';

    if(!is_home()&&!is_admin()){
        // ホーム（必ず表示）
        $home = '<a href="'. home_url() .'"><span class="home"></span></a>';

        // 以下条件分岐
        // カテゴリー
        if(is_category()) {
            //現カテゴリが子カテゴリの場合
            if($query_obj -> parent != 0){
                $ancestor_arr = array_reverse(get_ancestors($query_obj_id,'category',''));
                foreach($ancestor_arr as $ancestor){
                    $str = '<a href="'. get_category_link($ancestor) .'">'. get_cat_name($ancestor) .'</a>/';
                }

             //現カテゴリが親カテゴリの場合
			}else{
				$str ='<a href="'. get_category_link($query_obj) .'">'. get_cat_name($query_obj) .'</a>';
			}

             //カスタムタクソノミーアーカイブ
        } elseif(is_tax()){
            //現カテゴリが子カテゴリの場合
            if($query_obj -> parent != 0){
				$ancestor_arr = array_reverse(get_ancestors($query_obj_id, '', 'taxonomy'));  //祖先IDを昇順に取得
                foreach($ancestor_arr as $ancestor) {
                    $parent_term = get_term($ancestor);       // タームIDから祖先ターム情報を取得
                    $parent_slug = $parent_term->slug;        // 祖先タームスラッグを取得
                    $parent_name = $parent_term->name;        // 祖先ターム名を取得
                    $parent_str = '<a href="'.$parent_slug.'">'.$parent_name.'</a>/';
                }
                $str =$parent_str.$name;

             //現カテゴリが親カテゴリの場合
			}else{
                $str ='<a href="'.$slug.'">'.$name.'</a>';

            }

            // タグアーカイブ
        } elseif(is_tag()) {
            $tags = get_term_by('id',$query_obj_id,  'post_tag');    //タグIDよりタグ情報を取得
//            $tagslug =$tags -> slug;                                   //タグ名取得
            $str =$name;

            // カスタム投稿アーカイブ
        } elseif (is_post_type_archive()) {
            $posttypelink = get_post_type_archive_link($query_obj->post_type);
            $posttypename = post_type_archive_title('', false );
            $str ='<a href="'.$posttypelink .'">'.esc_html($posttypename).'</a>';

            //投稿記事
        } elseif(is_single()){
            $typelink = get_post_type_archive_link($query_obj->post_type);
            $typename = get_post_type_object(get_post_type())->label;
            $str ='<a href="'.$typelink .'">'.esc_html($typename).'</a>';


        } elseif (is_404()) {
            $str = '404 ページが見つかりません';
        } else {

        }
        $breadcrumb = $home .'/'.$str;
    }
    echo $breadcrumb;
}


?>
