<?php
	add_filter( 'wp_nav_menu_objects', function( $sorted_menu_items, $args ){
		$items_by_parent = [];
		foreach( $sorted_menu_items as $item ){
			$items_by_parent[ $item->menu_item_parent ][ $item->ID ] = $item;
		}
		$children_group = [ '1' => 10, '2' => 20, '3' => 30, '4' => 40 ];
		arsort( $children_group );
		foreach( $items_by_parent as $parent => $items ){
			foreach( $items as $item ){
				if( $item instanceof WP_Post ){
					if( isset( $items_by_parent[ $item->ID ] ) ){
						foreach( $children_group as $group => $count ){
							if( $count < count( $items_by_parent[ $item->ID ] ) ){
								$item->classes[] = 'menu-item-submenu-cols-' . $group;
								break;
							}
						}
					}
				}
			}
		}
		return $sorted_menu_items;
	}, 10, 2 );

	function hiweb_menu_list( $menu_location = 'main_menu', $menu_item_parent = 0, $main_menu_items_by_parent = null ){
		if( !is_array( $main_menu_items_by_parent ) ){
			$main_menu_items = get_nav_menu_by_location( $menu_location );
			$main_menu_items_by_parent = [];
			foreach( $main_menu_items->get_items() as $item ){
				if( $item instanceof WP_Post ){
					$main_menu_items_by_parent[ $item->menu_item_parent ][ $item->ID ] = $item;
				}
			}
		}
		if( isset( $main_menu_items_by_parent[ $menu_item_parent ] ) && is_array($main_menu_items_by_parent[ $menu_item_parent ]) && count($main_menu_items_by_parent[ $menu_item_parent ]) > 0 ){
			if( $menu_item_parent == '0' ){
				?>
				<nav id="main_menu_mobile" style="display: none;" class="hidden-lg">
				<?php
			}
			?>
			<ul>
				<?php
					foreach( $main_menu_items_by_parent[ $menu_item_parent ] as $item_id => $item ){
						?>
						<li>
							<a href="<?= $item->url ?>"><?= $item->title ?></a>
							<?php hiweb_menu_list( $menu_location, $item->ID, $main_menu_items_by_parent ); ?>
						</li>
						<?php
					}
				?>
			</ul>
			<?php
			if( $menu_item_parent == '0' ){
				?>
				</nav>
				<?php
			}
		}
	}