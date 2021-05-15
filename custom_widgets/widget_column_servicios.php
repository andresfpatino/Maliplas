<?php 

namespace Elementor;

class Widget_column_servicios extends Widget_Base {

    // Get widget name.
	public function get_name() { 
        return 'widget-column-servicios'; 
    }	

    //  Get widget title.
	public function get_title() { 
        return 'Column Servicios';
    }	

    // Get widget icon.
	public function get_icon() {
        return 'fa fa-columns'; 
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
				'label' => __( 'Servicio', 'column-servicio' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'imagen', [
                'label' => __( 'Imagen', 'column-servicio' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

		$repeater->add_control(
			'titulo', [
				'label' => __( 'Titulo', 'column-servicio' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'posicion_izquierda',
			[
				'label' => __( 'Posición izquierda', 'column-servicio' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Si', 'column-servicio' ),
				'label_off' => __( 'No', 'column-servicio' ),
				'return_value' => 'yes'
			]
		);	

		$repeater->add_control(
			'posicion_derecha',
			[
				'label' => __( 'Posición derecha', 'column-servicio' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Si', 'column-servicio' ),
				'label_off' => __( 'No', 'column-servicio' ),
				'return_value' => 'yes'
			]
		);		

	
		$this->add_control(
			'list',
			[
				'label' => __( 'Servicio', 'column-servicio' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'titulo' => __( 'Title', 'column-servicio' )
					],
				],
				'title_field' => '{{{ titulo }}} ',
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
			<div class="MLP__tab-servicios">
				<div class="MLP__tab-servicios--col-izq">
					<?php foreach (  $settings['list'] as $item ) : ?>				
						<?php if ( 'yes' === $item['posicion_izquierda'] ) : ?>
							<div class="MLP__tab-servicios-button" id="boton-<?php echo $item['_id'] ?>">
								<div><span class="diamond"></span></div>
								<div><span class="label"><?php echo $item['titulo'] ?></span></div> 
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
				<div class="MLP__tab-servicios--col-middle">
					<?php foreach (  $settings['list'] as $item ) : ?>
						<img class="MLP__tab-servicios-image-<?php echo $item['_id'] ?> image-etiquetas" src=" <?php echo $item['imagen']['url']  ?> ">
					<?php endforeach; ?>	
				</div>
				<div class="MLP__tab-servicios--col-der">
					<?php foreach (  $settings['list'] as $item ) : ?>
						<?php if ( 'yes' === $item['posicion_derecha'] ) : ?>
							<div class="MLP__tab-servicios-button" id="boton-<?php echo $item['_id'] ?>">
								<div><span class="diamond"></span></div>
								<div><span class="label"><?php echo $item['titulo'] ?></span></div> 
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div> <?php
		}
	}


	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 */

    protected function _content_template() { ?>
        <# if ( settings.list.length ) { #>
			<div class="MLP__tab-servicios">
				<div class="MLP__tab-servicios--col-izq">
					<# _.each( settings.list, function( item ) { #>		
						<# if ( 'yes' === item.posicion_izquierda ) { #>
							<div class="MLP__tab-servicios-button" id="boton-{{{ item._id }}}">
								<div><span class="diamond"></span></div>
								<div><span class="label">{{{ item.titulo }}}</span></div> 
							</div>
						<# } #>
					<# }); #>
				</div>
				<div class="MLP__tab-servicios--col-middle">
					<# _.each( settings.list, function( item ) { #>		
						<img class="MLP__tab-servicios-image-{{{ item._id }}} image-etiquetas" src=" {{ item.imagen.url }} ">
					<# }); #>	
				</div>
				<div class="MLP__tab-servicios--col-der">
					<# _.each( settings.list, function( item ) { #>		
						<# if ( 'yes' === item.posicion_derecha ) { #>
							<div class="MLP__tab-servicios-button" id="boton-{{{ item._id }}}">
								<div><span class="diamond"></span></div>
								<div><span class="label">{{{ item.titulo }}}</span></div> 
							</div>
						<# } #>
					<# }); #>
				</div>
			</div>
        <# } #>
        <?php
    }
}