<?php


if (!defined('ABSPATH')) {
    exit;
}

/**
 * 投稿タイプとタクソノミーを登録
 */
function eco_planning_register_content_types()
{
    register_taxonomy(
        'staff',
        ['post'],
        [
            'labels' => [
                'name'          => 'スタッフ紹介',
                'singular_name' => 'スタッフ紹介',
            ],
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
            'hierarchical'      => true,
            'rewrite'           => ['slug' => 'staff', 'with_front' => false],
        ]
    );

    register_post_type(
        'case',
        [
            'labels' => [
                'name'          => '実績・お客様の声',
                'singular_name' => '実績・お客様の声',
                'add_new_item'  => '記事を追加',
                'edit_item'     => '記事を編集',
            ],
            'public'             => true,
            'show_in_rest'       => true,
            'has_archive'        => 'case',
            'rewrite'            => ['slug' => 'case', 'with_front' => false],
            'menu_icon'           => 'dashicons-portfolio',
            'supports'            => ['title', 'editor', 'thumbnail', 'excerpt'],
            'taxonomies'          => ['works', 'voice'],
            'show_in_nav_menus'   => true,
            'exclude_from_search' => false,
        ]
    );

    register_taxonomy(
        'works',
        ['case'],
        [
            'labels' => ['name' => '実績', 'singular_name' => '実績'],
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
            'hierarchical'      => true,
            'rewrite'           => ['slug' => 'case/works', 'with_front' => false],
        ]
    );

    register_taxonomy(
        'voice',
        ['case'],
        [
            'labels' => ['name' => 'お客様の声', 'singular_name' => 'お客様の声'],
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
            'hierarchical'      => true,
            'rewrite'           => ['slug' => 'case/voice', 'with_front' => false],
        ]
    );

    register_post_type(
        'job',
        [
            'labels' => [
                'name'          => '募集要項',
                'singular_name' => '募集要項',
                'add_new_item'  => '募集要項を追加',
                'edit_item'     => '募集要項を編集',
            ],
            'public'             => true,
            'show_in_rest'       => true,
            'has_archive'        => 'job-description',
            'rewrite'            => ['slug' => 'job-description', 'with_front' => false],
            'menu_icon'           => 'dashicons-businessperson',
            'supports'            => ['title', 'editor', 'thumbnail', 'excerpt'],
            'taxonomies'          => ['employment', 'area'],
            'show_in_nav_menus'   => true,
            'exclude_from_search' => false,
        ]
    );

    register_taxonomy(
        'employment',
        ['job'],
        [
            'labels' => ['name' => '雇用形態', 'singular_name' => '雇用形態'],
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
            'hierarchical'      => true,
            'rewrite'           => ['slug' => 'job-description/employment', 'with_front' => false],
        ]
    );

    register_taxonomy(
        'area',
        ['job'],
        [
            'labels' => ['name' => '勤務エリア', 'singular_name' => '勤務エリア'],
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
            'hierarchical'      => true,
            'rewrite'           => ['slug' => 'job-description/area', 'with_front' => false],
        ]
    );
}
add_action('init', 'eco_planning_register_content_types', 5);

/**
 * 一覧URL、記事IDを使う詳細URL、
 * カスタムタクソノミーの一覧URLを登録
 */
function eco_planning_register_content_rewrite_rules()
{
    // CPTの添付ファイル用ルールより、タクソノミー一覧を優先します。
    add_rewrite_rule('^case/works/(.+?)/page/([0-9]+)/?$', 'index.php?works=$matches[1]&paged=$matches[2]', 'top');
    add_rewrite_rule('^case/works/(.+?)/?$', 'index.php?works=$matches[1]', 'top');
    add_rewrite_rule('^case/voice/(.+?)/page/([0-9]+)/?$', 'index.php?voice=$matches[1]&paged=$matches[2]', 'top');
    add_rewrite_rule('^case/voice/(.+?)/?$', 'index.php?voice=$matches[1]', 'top');
    add_rewrite_rule('^job-description/employment/(.+?)/page/([0-9]+)/?$', 'index.php?employment=$matches[1]&paged=$matches[2]', 'top');
    add_rewrite_rule('^job-description/employment/(.+?)/?$', 'index.php?employment=$matches[1]', 'top');
    add_rewrite_rule('^job-description/area/(.+?)/page/([0-9]+)/?$', 'index.php?area=$matches[1]&paged=$matches[2]', 'top');
    add_rewrite_rule('^job-description/area/(.+?)/?$', 'index.php?area=$matches[1]', 'top');

    add_rewrite_rule('^news/?$', 'index.php?eco_news_archive=1', 'top');
    add_rewrite_rule('^news/page/([0-9]+)/?$', 'index.php?eco_news_archive=1&paged=$matches[1]', 'top');
    add_rewrite_rule('^news/([0-9]+)/?$', 'index.php?p=$matches[1]', 'top');
    add_rewrite_rule('^case/([0-9]+)/?$', 'index.php?post_type=case&p=$matches[1]', 'top');
}
add_action('init', 'eco_planning_register_content_rewrite_rules', 20);

function eco_planning_add_query_vars($query_vars)
{
    $query_vars[] = 'eco_news_archive';
    return $query_vars;
}
add_filter('query_vars', 'eco_planning_add_query_vars');

function eco_planning_prepare_news_archive($query)
{
    if (is_admin() || !$query->is_main_query() || !$query->get('eco_news_archive')) {
        return;
    }

    $query->set('post_type', 'post');
    $query->set('post_status', 'publish');
}
add_action('pre_get_posts', 'eco_planning_prepare_news_archive');

function eco_planning_news_archive_template($template)
{
    if (!get_query_var('eco_news_archive')) {
        return $template;
    }

    $news_template = get_theme_file_path('/home.php');
    return file_exists($news_template) ? $news_template : $template;
}
add_filter('template_include', 'eco_planning_news_archive_template');

function eco_planning_post_id_permalink($permalink, $post)
{
    if ('post' !== $post->post_type || 'publish' !== $post->post_status) {
        return $permalink;
    }

    return home_url('/news/' . $post->ID . '/');
}
add_filter('post_link', 'eco_planning_post_id_permalink', 10, 2);

function eco_planning_custom_post_id_permalink($permalink, $post)
{
    $bases = ['case' => 'case'];

    if (!isset($bases[$post->post_type]) || 'publish' !== $post->post_status) {
        return $permalink;
    }

    return home_url('/' . $bases[$post->post_type] . '/' . $post->ID . '/');
}
add_filter('post_type_link', 'eco_planning_custom_post_id_permalink', 10, 2);

function eco_planning_flush_content_rewrite_rules()
{
    eco_planning_register_content_types();
    eco_planning_register_content_rewrite_rules();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'eco_planning_flush_content_rewrite_rules');

function my_body_class($classes)
{
    if (is_page()) {
        $page = get_post();
        $classes[] = $page->post_name;
    }
    return $classes;
}
add_filter('body_class', 'my_body_class');

function eco_planning_resource_hints($urls, $relation_type) {
    if ('preconnect' === $relation_type) {
        $urls[] = 'https://fonts.googleapis.com';
        $urls[] = [
            'href'        => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        ];
    }

    return $urls;
}
add_filter('wp_resource_hints', 'eco_planning_resource_hints', 10, 2);


function enqueue_custom_styles_and_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Noto+Sans+JP:wght@100..900&family=Noto+Serif+JP:wght@400&display=swap',
        [],
        null
    );

    // Swiper CSS
    wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', [], null );

    // Scroll Hint CSS
    wp_enqueue_style( 'scroll-hint-css', 'https://cdn.jsdelivr.net/npm/scroll-hint@1.2.9/css/scroll-hint.css', [], null );

    // Main Stylesheet
    $main_style_path = get_template_directory() . '/css/style.css';
    wp_enqueue_style(
        'main-style',
        get_template_directory_uri() . '/css/style.css',
        [],
        file_exists($main_style_path) ? (string) filemtime($main_style_path) : null
    );

    // jQuery
    wp_enqueue_script( 'jquery-cdn', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js', [], null, true );

    // GSAP Scripts
    wp_enqueue_script( 'gsap-core', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', [], null, true );
    wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', ['gsap-core'], null, true );

    // Swiper Script
    wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', [], null, true );

    // Scroll Hint Script
    wp_enqueue_script( 'scroll-hint-js', 'https://cdn.jsdelivr.net/npm/scroll-hint@1.2.9/js/scroll-hint.min.js', [], null, true );

    // Custom Scripts
    wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/script.js', ['jquery-cdn', 'scroll-hint-js'], null, true );
    wp_enqueue_script( 'custom-gsap-script', get_template_directory_uri() . '/js/gsap.js', ['gsap-core', 'gsap-scrolltrigger'], null, true );

    wp_enqueue_script( 'form-validation-script', get_template_directory_uri() . '/js/form-validation.js', ['jquery-cdn'], null, true );
}

add_action( 'wp_enqueue_scripts', 'enqueue_custom_styles_and_scripts' );

   // アイキャッチ画像の設定
function my_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ]);
}
add_action('after_setup_theme', 'my_setup');

// wppagenaviのカスタマイズ

function custom_wp_pagenavi($html) {
    // ここでHTMLの内容を確認するためにログに出力してみます
    error_log($html);

    // 前へのリンクのテキストを画像に置き換える
    $html = str_replace('class="previouspostslink"', 'class="previouspostslink"', $html);
    $html = str_replace('←', '<img src="' . get_template_directory_uri() . '/img/common/next-arrow.svg" alt="前へ">', $html);

    // 次へのリンクのテキストを画像に置き換える
    $html = str_replace('class="nextpostslink"', 'class="nextpostslink"', $html);
    $html = str_replace('→', '<img src="' . get_template_directory_uri() . '/img/common/next-arrow.svg" alt="次へ">', $html);

    return $html;
}
add_filter('wp_pagenavi', 'custom_wp_pagenavi');


// サンクスページへの遷移
add_action('wp_footer', 'add_thanks_page');
function add_thanks_page()
{ ?>
	<script>
		document.addEventListener('wpcf7mailsent', function(event) {
			location = '<?php echo esc_url(home_url('/contact/thanks/')); ?>'; /* 遷移先のURL */
		}, false);
	</script>
<?php }

/**
 * 投稿編集画面で使用する ACF フィールド
 */
function eco_planning_register_acf_fields()
{
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group([
        'key'      => 'group_eco_planning_case_fields',
        'title'    => '実績・お客様の声の追加情報',
        'fields'   => [
            [
                'key'         => 'field_eco_planning_case_client_name',
                'label'       => 'クライアント名・会社名',
                'name'        => 'case_client_name',
                'type'        => 'text',
                'placeholder' => '株式会社○○様',
            ],
        ],
        'location' => [[[
            'param'    => 'post_type',
            'operator' => '==',
            'value'    => 'case',
        ]]],
    ]);

    $job_fields = [
        'job_position'        => ['職種', 'text'],
        'job_description'     => ['仕事内容', 'textarea'],
        'job_employment_type' => ['雇用形態', 'text'],
        'job_working_hours'   => ['勤務時間', 'textarea'],
        'job_location'        => ['勤務地', 'textarea'],
        'job_nearest_station' => ['最寄駅', 'textarea'],
        'job_salary'          => ['給与', 'textarea'],
        'job_holidays'        => ['休日・休暇', 'textarea'],
        'job_benefits'        => ['福利厚生', 'textarea'],
        'job_requirements'    => ['その他要件', 'textarea'],
    ];
    $acf_job_fields = [];

    foreach ($job_fields as $name => [$label, $type]) {
        $acf_job_fields[] = [
            'key'       => 'field_eco_planning_' . $name,
            'label'     => $label,
            'name'      => $name,
            'type'      => $type,
            'new_lines' => 'br',
        ];
    }

    acf_add_local_field_group([
        'key'      => 'group_eco_planning_job_fields',
        'title'    => '募集要項',
        'fields'   => $acf_job_fields,
        'location' => [[[
            'param'    => 'post_type',
            'operator' => '==',
            'value'    => 'job',
        ]]],
    ]);
}
add_action('acf/init', 'eco_planning_register_acf_fields');

/**
 * ACF 未有効時も同名の投稿メタを取得できるようにする
 */
function eco_planning_get_field_value($field_name, $post_id = 0)
{
    $post_id = $post_id ?: get_the_ID();

    if (function_exists('get_field')) {
        return get_field($field_name, $post_id);
    }

    return get_post_meta($post_id, $field_name, true);
}

function eco_planning_get_post_terms($post_id, array $taxonomies)
{
    $terms = [];

    foreach ($taxonomies as $taxonomy) {
        $post_terms = get_the_terms($post_id, $taxonomy);
        if (!is_wp_error($post_terms) && $post_terms) {
            $terms = array_merge($terms, $post_terms);
        }
    }

    return $terms;
}

function eco_planning_render_pagination()
{
    $links = paginate_links([
        'type'      => 'array',
        'prev_text' => '<span aria-hidden="true">&lsaquo;</span><span class="screen-reader-text">前のページ</span>',
        'next_text' => '<span aria-hidden="true">&rsaquo;</span><span class="screen-reader-text">次のページ</span>',
    ]);

    if (!$links) {
        return;
    }
    ?>
    <nav class="site-pagination" aria-label="ページ送り">
        <ol class="site-pagination__list">
            <?php foreach ($links as $link) : ?>
                <?php
                $is_current = false !== strpos($link, 'current');
                $is_arrow = false !== strpos($link, 'prev page-numbers') || false !== strpos($link, 'next page-numbers');
                $classes = 'site-pagination__link';
                $classes .= $is_current ? ' is-current' : '';
                $classes .= $is_arrow ? ' site-pagination__link--arrow' : '';
                $link = str_replace('page-numbers', 'page-numbers ' . $classes, $link);
                ?>
                <li><?php echo wp_kses_post($link); ?></li>
            <?php endforeach; ?>
        </ol>
    </nav>
    <?php
}

function eco_planning_render_term_links($taxonomy, $show_all = false)
{
    if ($show_all) {
        $archive_link = 'job' === get_post_type() || is_post_type_archive('job')
            ? get_post_type_archive_link('job')
            : home_url('/');
        printf(
            '<a class="site-archive-category__link%s" href="%s">すべて</a>',
            is_post_type_archive('job') ? ' is-current' : '',
            esc_url($archive_link)
        );
    }

    $terms = get_terms([
        'taxonomy'   => $taxonomy,
        'hide_empty' => false,
    ]);

    if (is_wp_error($terms)) {
        return;
    }

    foreach ($terms as $term) {
        $term_link = get_term_link($term);
        if (is_wp_error($term_link)) {
            continue;
        }

        $is_current_term = 'category' === $taxonomy
            ? is_category($term->term_id)
            : is_tax($taxonomy, $term->term_id);

        printf(
            '<a class="site-archive-category__link%s" href="%s">%s</a>',
            $is_current_term ? ' is-current' : '',
            esc_url($term_link),
            esc_html($term->name)
        );
    }
}
