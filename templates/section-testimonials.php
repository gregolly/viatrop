<section class="testimonial-section py-5 bg-light d-none">
    <div class="container">
        <div class="testimonial-wrapper mx-auto">
            <div class="testimonial-content-box p-4 p-md-5 bg-white shadow-sm border rounded">
                <span class="quote-icon d-block mb-3 display-4 text-muted">"</span>
                
                <?php
                $args = array(
                    'post_type'      => 'depoimento',
                    'posts_per_page' => -1, // Pega todos os depoimentos
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                );
                $depoimentos_query = new WP_Query( $args );

                $depoimentos_data = [];
                if ( $depoimentos_query->have_posts() ) :
                    while ( $depoimentos_query->have_posts() ) : $depoimentos_query->the_post();
                        $depoimentos_data[] = [
                            'id'       => get_the_ID(),
                            'content'  => apply_filters( 'the_content', get_the_content() ),
                            'author'   => get_the_title(),
                            'avatar'   => get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ),
                            'role'     => get_post_meta( get_the_ID(), '_depoimento_cargo_empresa', true ),
                        ];
                    endwhile;
                    wp_reset_postdata();
                endif;

                if ( ! empty( $depoimentos_data ) ) :
                    // Pega o primeiro depoimento para exibir inicialmente
                    $first_depoimento = $depoimentos_data[0];
                ?>
                    <div id="testimonial-text" class="mb-4 lead testimonial-text">
                        <?php echo $first_depoimento['content']; ?>
                    </div>
                    
                    <div class="d-flex align-items-center mb-4">
                        <?php if ( $first_depoimento['avatar'] ) : ?>
                            <img id="testimonial-avatar" src="<?php echo esc_url( $first_depoimento['avatar'] ); ?>" alt="<?php echo esc_attr( $first_depoimento['author'] ); ?>" class="testimonial-avatar rounded-circle me-3">
                        <?php endif; ?>
                        <div>
                            <p id="testimonial-author" class="testimonial-author fw-bold mb-0">
                                <?php echo esc_html( $first_depoimento['author'] ); ?>
                            </p>
                            <small id="testimonial-role" class="testimonial-role text-muted">
                                <?php echo esc_html( $first_depoimento['role'] ); ?>
                            </small>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ( count( $depoimentos_data ) > 1 ) : // Só mostra os seletores se houver mais de um depoimento ?>
                <div class="testimonial-selectors d-flex justify-content-center mt-4">
                    <?php 
                    foreach ( $depoimentos_data as $index => $depoimento ) :
                        $is_active = ( $index === 0 ) ? 'active' : '';
                    ?>
                        <button type="button" class="testimonial-selector btn btn-outline-secondary <?php echo $is_active; ?> mx-2 py-3 px-4 d-flex flex-column justify-content-center align-items-center text-start" 
                                data-testimonial-id="<?php echo esc_attr( $depoimento['id'] ); ?>"
                                data-content='<?php echo json_encode( $depoimento ); ?>'>
                            <p class="mb-1 fw-bold"><?php echo esc_html( $depoimento['author'] ); ?></p>
                            <small class="text-muted"><?php echo esc_html( $depoimento['role'] ); ?></small>
                        </button>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
    // Passa os dados dos depoimentos para o JavaScript
    var depoimentosData = <?php echo json_encode( $depoimentos_data ); ?>;
</script>