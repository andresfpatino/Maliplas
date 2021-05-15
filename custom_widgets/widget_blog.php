<?php 

namespace Elementor;

class Widget_blog extends Widget_Base {

    // Get widget name.
	public function get_name() { 
        return 'widget-blog'; 
    }	

    //  Get widget title.
	public function get_title() { 
        return 'Custom blog';
    }	

    // Get widget icon.
	public function get_icon() {
        return 'fa fa-newspaper-o'; 
    }

    // Get widget categories.
	public function get_categories() { 
        return [ 'basic' ]; 
    }

    //Controls widget
	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );
		$this->end_controls_section();
	}

    // Render widget output on the frontend.
	protected function render() { ?>

        <div class="MLP__blog-grid"> 
            <?php
                // Post continuos
                $arg_Post = array(
                    'post_type'      => 'post',
                    'publish_status' => 'published',
                    'posts_per_page' => -1			
                );        
                $queryPosts = new \WP_Query($arg_Post);
                if($queryPosts->have_posts()) : ?>
                   
                    <?php while($queryPosts->have_posts()) : $queryPosts->the_post() ; 
                        $featured_img_url = get_the_post_thumbnail_url(); ?>	
                        <div class="MLP__wrap_post" style="background-image: url('<?php echo $featured_img_url; ?>');">	
                            <div class="MLP__post-content-wrap">
                                <h4 class="MLP__post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <p class="MLP__post-excerpt"> <?php echo mb_strimwidth(get_the_excerpt(), 0, 250, '...'); ?> </p>
                                <a class="MLP__read-more" href=" <?php the_permalink(); ?> "> 
                                    <?php echo _e('Leer más','MLP');  ?><img src="<?php echo get_site_url() ?>/wp-content/uploads/arrow.svg"> 
                                </a>
                            </div>                               
                        </div>
                    <?php endwhile; wp_reset_postdata();  ?>
                    
                <?php endif; ?>      

        </div>

	<?php }	
}