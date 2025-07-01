<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Loveicon_FAQ extends Widget_Base
{
    public function get_name()
    {
        return 'loveicon_faq';
    }

    public function get_title()
    {
        return esc_html__('Loveicon FAQ', 'loveicon-core');
    }

    public function get_icon()
    {
        return 'sds-widget-ico';
    }

    public function get_categories()
    {
        return ['Loveicon'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'general',
            array(
                'label' => esc_html__('general', 'plumbio-core'),
            )
        );
        $this->add_control(
            'total_item',
            array(
                'label'   => esc_html__('Per Column Items', 'loveicon-core'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 5,
            )
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'item',
            [
                'label' => esc_html__('item', 'loveicon-core'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'item_question_content',
            [
                'label' => esc_html__('Question Content', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('How will my donation be used?', 'loveicon-core'),
            ]
        );


        $repeater->add_control(
            'item_answer_content',
            [
                'label' => esc_html__('Answer Content', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Nostrud aliquips exercitation laboris nisiut temp sed duise Lorem ipsum dolor sit amet consectetur adipisicing elit atd eiusmod tempor incididunt labore dolore.', 'loveicon-core'),
            ]
        );


        $this->add_control(
            'items',
            [
                'label' => esc_html__('Repeater List', 'loveicon-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('Title #1', 'loveicon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'loveicon-core'),
                    ],
                    [
                        'list_title' => esc_html__('Title #2', 'loveicon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'loveicon-core'),
                    ],
                ],
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $total_item = $settings['total_item'];

?>
        <!--Start Faq Style1 Area-->
        <section class="faq-style1-area">
            <div class="container">
                <div class="row">
                    <?php
                    $i     = 0;
                    $count = 1;
                    foreach ($settings['items'] as $item) {
                        $item_question_content       = $item['item_question_content'];
                        $item_answer_content = $item['item_answer_content'];
                        $i++;
                        if ($i == 1) {
                            $active = 'active';
                            $active2 = 'collapsed';
                        } else {
                            $active = '';
                            $active2 = '';
                        }

                    ?>
                        <?php if ($count == 1) { ?>
                            <div class="col-xl-6 text-right-rtl">
                                <div class="faq-style1-content">
                                    <div class="accordion-box">
                                    <?php } ?>
                                    <div class="accordion accordion-block">
                                        <div class="accord-btn <?php echo $active; ?>">
                                            <h4><?php echo $item_question_content; ?></h4>
                                        </div>
                                        <div class="accord-content <?php echo $active2; ?>">
                                            <p><?php echo $item_answer_content; ?></p>
                                        </div>
                                    </div>
                                    <?php if ($total_item == $count) { ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $count = 1;
                            $flag = 0;
                        } else {
                            $count++;
                            $flag = 1;
                        }
                    }
                    if ($flag) {
                        ?>
                </div>
            </div>
        <?php } ?>
        </div>
        </div>
        </section>
<?php
    }
}