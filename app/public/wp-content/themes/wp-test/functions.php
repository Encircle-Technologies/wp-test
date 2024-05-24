<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'hello-elementor','hello-elementor','hello-elementor-theme-style','hello-elementor-header-footer' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION


function mytheme_child_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
}
add_action('wp_enqueue_scripts', 'mytheme_child_enqueue_styles');

function mytheme_child_setup() {
    register_nav_menus(array(
        'menu-1' => esc_html__('Primary', 'mytheme-child'),
    ));
}
add_action('after_setup_theme', 'mytheme_child_setup');

// Product hunt api for banner start (It will display number of post based on post count like this - [product_hunt_posts post="3"])
function fetch_product_hunt_data($atts) {
    $atts = shortcode_atts(array(
        'post' => 3,
    ), $atts, 'product_hunt_posts');
    $num_posts = intval($atts['post']);
    $api_url = 'https://api.producthunt.com/v2/api/graphql';
    $apikey="UCRY63EzWPQUiX4c02507QWoLhFX9gXrd3gSZ3DIUWA";
    $args = array(
        'headers' => array(
            'Authorization' => 'Bearer ' .$apikey,
            'Content-Type' => 'application/json',
        ),
        'body' => json_encode(array(
            'query' => '{ posts(first: ' . $num_posts . ') { edges { node { name tagline url } } } }',
        )),
    );

    $response = wp_remote_post($api_url, $args);

    if (is_wp_error($response)) {
        error_log('API request failed: ' . $response->get_error_message());
        return 'Failed to fetch data';
    }

    $response_body = wp_remote_retrieve_body($response);
    $data = json_decode($response_body, true);

    // Log the entire response for debugging
    error_log('API response: ' . print_r($data, true));

    if (!isset($data['data']['posts']['edges'])) {
        return 'No posts found';
    }

    $output = '<ul class="product-hunt-posts">';

    foreach ($data['data']['posts']['edges'] as $post) {
        if (isset($post['node']['name']) && isset($post['node']['tagline']) && isset($post['node']['url'])) {
            $output .= '<li><a href="' . esc_url($post['node']['url']) . '" target="_blank">' . esc_html($post['node']['name']) . '</a>: ' . esc_html($post['node']['tagline']) . '</li>';
        }
    }

    $output .= '</ul>';
    return $output;
}
add_shortcode('product_hunt_posts', 'fetch_product_hunt_data');
// Product hunt api for banner end

// weather api start (It will fetch weather based on location givin in paramiter like this - [weather location="Europe"])
function weather_shortcode($atts) {
    $atts = shortcode_atts(array(
        'location' => 'London,uk'
    ), $atts);
    $location = esc_js($atts['location']);
    $api_key = '84a561f2a4b08a5ca0637bfd5b7272fe'; 
    ob_start();
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const placeholder = document.getElementById('weather-placeholder');
            if (!placeholder) return;
            const location = "<?php echo $location; ?>";
            const apiKey = "<?php echo $api_key; ?>";
            fetch(`https://api.openweathermap.org/data/2.5/weather?q=${location}&appid=${apiKey}&units=metric`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.cod !== 200) {
                        placeholder.innerHTML = '<p>Unable to retrieve weather data.</p>';
                        return;
                    }

                    const locationName = data.name;
                    const temperature = data.main.temp;
                    const description = data.weather[0].description;
                    const icon = data.weather[0].icon;
                    const iconUrl = `https://openweathermap.org/img/wn/${icon}.png`;

                    placeholder.innerHTML = `
                        <div class='weather-widget'>
                            <strong>Weather in ${locationName}</strong>
                            <p>Temperature: ${temperature}&deg;C</p>
                        </div>
                    `;
                })
                .catch(error => {
                    placeholder.innerHTML = '<p>Unable to retrieve weather data.</p>';
                    console.error('There was a problem with the fetch operation:', error);
                });
        });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('weather', 'weather_shortcode');
// weather api end

// Footer Current year start
function currentYear( $atts ){
    return date('Y');
}
add_shortcode( 'year', 'currentYear' );
// Footer Current year end



