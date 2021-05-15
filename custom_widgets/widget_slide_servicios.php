<?php 

namespace Elementor;

class Widget_slider_servicios extends Widget_Base {

    // Get widget name.
	public function get_name() { 
        return 'widget-slide-servicios'; 
    }	

    //  Get widget title.
	public function get_title() { 
        return 'Slide Servicios';
    }	

    // Get widget icon.
	public function get_icon() {
        return 'fa fa-list-alt'; 
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
				'label' => __( 'Servicio', 'slide-servicios' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icono', [
                'label' => __( 'Icono', 'slide-servicios' ),
                'type' => Controls_Manager::MEDIA,
                //'default' => ['url' => Utils::get_placeholder_image_src(),]
            ]
        );

		$repeater->add_control(
			'titulo', [
				'label' => __( 'Titulo', 'slide-servicios' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Servicio' , 'slide-servicios' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'subtitulo', [
				'label' => __( 'Sub-Titulo', 'slide-servicios' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Nombre' , 'slide-servicios' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'contenido', [
				'label' => __( 'Contenido', 'slide-servicios' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( '
					<ul>
						<li>Item List</li>
						<li>Item List</li>
						<li>Item List</li>
					</ul>' , 
					'slide-servicios' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'text_button', [
				'label' => __( 'Texto botón', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Ver más', 'elementor' ),
				'placeholder' => __( 'Ver más', 'elementor' ),
			]
		);

		$repeater->add_control(
			'link_button',
			[
				'label' => __( 'Link botón', 'elementor' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'elementor' ),
				'default' => [
					'url' => '#',
				],
			]
		);



		$this->add_control(
			'list',
			[
				'label' => __( 'Servicios', 'slide-servicios' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'subtitulo' => __( 'Title #1', 'slide-servicios' ),
						'contenido' => __( 'Item content. Click the edit button to change this text.', 'slide-servicios' ),
					],
					[
						'subtitulo' => __( 'Title #2', 'slide-servicios' ),
						'contenido' => __( 'Item content. Click the edit button to change this text.', 'slide-servicios' ),
					],
				],
				'title_field' => '{{{ titulo }}} {{{ subtitulo }}}',
			]
		);

		$this->end_controls_section();

	}


    /*
    * Render widget output on the frontend.
    *
    * Written in PHP and used to generate the final HTML.
    *
    */

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( $settings['list'] ) { ?>

			<div class="swiper-container" id="slide-servicios">
				<div class="MLP__slide-servicios swiper-wrapper ">
					<?php foreach (  $settings['list'] as $item ) { ?>
						<div class="MLP__slide-servicios--wrap-item swiper-slide">
							<a href="<?php echo $item['link_button']['url'] ?>">
								<img class="MLP__slide-servicios--icon" src=" <?php echo $item['icono']['url']  ?> ">
							</a>
							<h3 class="MLP__slide-servicios--main_title"> 
								<span class="MLP__slide-servicios--subtitle"> <?php echo $item['titulo'] ?> </span>
								<?php echo $item['subtitulo'] ?> 
							</h3>
							<div class="MLP__slide-servicios--detail"> <?php echo $item['contenido'] ?> </div>
							<a class="MLP__slide-servicios--button" href=" <?php echo $item['link_button']['url'] ?>"> <?php echo $item['text_button'] ?> <img src="<?php echo get_site_url() ?>/wp-content/uploads/arrow.svg"></a>
						</div>
					<?php } ?>
				</div>
				<div class="swiper-pagination"></div>
			</div>
			 <?php
		}
	}


	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 */

    protected function _content_template() {
        ?>
        <# if ( settings.list.length ) { #>
			<div class="swiper-container" id="slide-servicios">
				<div class="MLP__slide-servicios swiper-wrapper">
					<# _.each( settings.list, function( item ) { #>
						<div class="MLP__slide-servicios--wrap-item swiper-slide">
							<a href="<?php echo $item['link_button']['url'] ?>">
								<img class="MLP__slide-servicios--icon" src=" {{ item.icono.url }} ">
							</a>
							<h3 class="MLP__slide-servicios--main_title"> 
								<span class="MLP__slide-servicios--subtitle"> {{{ item.titulo }}} </span>
								{{{ item.subtitulo }}}
							</h3>						
							<div class="MLP__slide-servicios--detail"> {{{ item.contenido }}} </div>
							<a class="MLP__slide-servicios--button" href=" {{ item.link_button.url }}"> {{ item.text_button }} <img src="<?php echo get_site_url() ?>/wp-content/uploads/arrow.svg"></a>
						</div>
					<# }); #>
				</div>
				<div class="swiper-pagination"></div>
			</div>
        <# } #>
        <?php
    }


}