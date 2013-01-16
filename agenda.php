<div id="agenda-images">
    <img class="agenda-image" id="category-image10" src="<?php echo $this->get_theme_img_url( 'ArtCulture.jpg' ); ?>" alt="">
    <img class="agenda-image" id="category-image9" style="display:none" src="<?php echo $this->get_theme_img_url( 'loom.jpg' ); ?>" alt="">
    <img class="agenda-image" id="category-image11" style="display:none" src="<?php echo $this->get_theme_img_url( 'SocialEducational.jpg' ); ?>" alt="">
    <img class="agenda-image" id="category-image8" style="display:none" src="<?php echo $this->get_theme_img_url( 'Spiritual.jpg' ); ?>" alt="">
    <img class="agenda-image" id="category-image12" style="display:none" src="<?php echo $this->get_theme_img_url( 'Wellness.jpg' ); ?>" alt="">
</div>
<h2 class="ai1ec-calendar-title"><?php // echo esc_html( $title ); ?></h2>
<div class="ai1ec-title-buttons btn-toolbar">
	<div class="btn-group">
		<a id="ai1ec-today" class="ai1ec-load-view btn btn-mini"
			href="#action=ai1ec_agenda&amp;ai1ec_post_ids=<?php echo $post_ids; ?>">
			<?php _e( 'Today', AI1EC_PLUGIN_NAME ); ?>
		</a>
	</div>
	<div class="ai1ec-pagination btn-group pull-right">
		<?php foreach( $pagination_links as $link ): ?>
			<a id="<?php echo $link['id']; ?>"
				class="ai1ec-load-view btn"
				href="<?php echo esc_attr( $link['href'] ); ?>&amp;ai1ec_post_ids=<?php echo $post_ids; ?>">
				<?php echo esc_html( $link['text'] ); ?>
			</a>
		<?php endforeach; ?>
	</div>
</div>
<ol class="ai1ec-agenda-view">
	<?php if( ! $dates ): ?>
		<p class="ai1ec-no-results">
			<?php _e( 'There are no upcoming events to display at this time.', AI1EC_PLUGIN_NAME ) ?>
		</p>
	<?php else: ?>
		<?php foreach( $dates as $timestamp => $date_info ): ?>
			<li class="ai1ec-date <?php if( isset( $date_info['today'] ) && $date_info['today'] ) echo 'ai1ec-today' ?>
				<?php if ( $show_year_in_agenda_dates ) echo 'ai1ec-agenda-plus-year' ?>">
				<div class="ai1ec-date-title">
					<span class="ai1ec-month"><?php echo date_i18n( 'F', $timestamp, true ) ?></span>,
					<span class="ai1ec-day"><?php echo date_i18n( 'd', $timestamp, true ) ?></span>
					<span class="ai1ec-weekday"><?php // echo date_i18n( 'D', $timestamp, true ) ?></span>
					<?php if ( $show_year_in_agenda_dates ): ?>
						<span class="ai1ec-year"><?php echo date_i18n( 'Y', $timestamp, true ) ?></span>
					<?php endif; ?>
				</div>
				<ol class="ai1ec-date-events">
					<?php foreach( $date_info['events'] as $category ): ?>
						<?php foreach( $category as $event ): ?>
							<li class="ai1ec-event
								ai1ec-event-id-<?php echo $event->post_id ?>
								ai1ec-event-instance-id-<?php echo $event->instance_id ?>
								<?php if( $event->allday ) echo 'ai1ec-allday' ?>
								<?php if( $event->post_id == $active_event ) echo 'ai1ec-active-event' ?>
								<?php if( $expanded ) echo 'ai1ec-expanded' ?>">

								<div class="ai1ec-event-title">
									<div class="ai1ec-event-click">
										<span class="ai1ec-event-header"><?php echo esc_html( apply_filters( 'the_title', $event->post->post_title ) ) ?></span>
										<div class="ai1ec-event-time">
											<?php if( $event->allday ): ?>
												<span class="ai1ec-allday-label">
													<?php echo esc_html( $event->short_start_date ) ?>
													<?php if( $event->short_end_date != $event->short_start_date ): ?>
														– <?php echo esc_html( $event->short_end_date ) ?>
														<?php if( $event->allday ): ?>
														<?php endif ?>
													<?php endif ?>
													<?php _e( ' (all-day)', AI1EC_PLUGIN_NAME ) ?>
												</span>
											<?php else: ?>
												<?php echo esc_html( $event->start_time . ' – ' . $event->end_time ) ?></span>
											<?php endif ?>
										</div>
                                        <?php if ( $show_location_in_title && isset( $event->venue ) && $event->venue != '' ): ?>
                                            <div class="ai1ec-event-location"><?php echo $event->venue ?></div>
                                        <?php endif; ?>
									</div>
								</div>

								<?php // Insert post ID for use by JavaScript filtering later ?>
								<input type="hidden" class="ai1ec-post-id" value="<?php echo $event->post_id ?>" />



							</li>
						<?php endforeach ?>
					<?php endforeach ?>
				</ol>
			</li>
		<?php endforeach ?>
	<?php endif ?>
</ol>
