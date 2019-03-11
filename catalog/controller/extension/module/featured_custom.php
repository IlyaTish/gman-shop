<?php
class ControllerExtensionModuleFeaturedCustom extends Controller {
	public function index($setting) {
		$this->load->language('extension/module/featured_custom');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		$data['products'] = array();

		if (!$setting['limit']) {
			$setting['limit'] = 4;
		}

		if (!empty($setting['product'])) {
			$products = array_slice($setting['product'], 0, (int)$setting['limit']);

			foreach ($products as $product_id) {
				$product_info = $this->model_catalog_product->getProduct($product_id);

				if ($product_info) {
					if ($product_info['image']) {
						$image = $this->model_tool_image->resize($product_info['image'], $setting['width'], $setting['height']);
					} else {
						$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
					}

					if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
						$price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					} else {
						$price = false;
					}

					if ((float)$product_info['special']) {
						$special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					} else {
						$special = false;
					}

					if ($this->config->get('config_tax')) {
						$tax = $this->currency->format((float)$product_info['special'] ? $product_info['special'] : $product_info['price'], $this->session->data['currency']);
					} else {
						$tax = false;
					}

					if ((float)$product_info['special']) {
						$data['action_percent'] = 100-round($product_info['special']/$product_info['price']*100, 0);
					} else {
						$data['action_percent']= false;
					}

					if ($special) {
						$action_percent = 100-round($product_info['special']/$product_info['price']*100, 0);
					} else {
						$action_percent = "0";
					}

					$tags = array();

					if ($product_info['tag']) {
						$tagsi = explode(',', $product_info['tag']);

						foreach ($tagsi as $tag) {
							$tags[] = array(
								'tag'  => trim($tag),
								'href' => $this->url->link('product/search', 'tag=' . trim($tag))
							);
						}
					}

					$data['products'][] = array(
						'product_id'     => $product_info['product_id'],
						'thumb'          => $image,
						'tags'           => $tags,
						'name'           => $product_info['name'],
						'model'          => $product_info['model'],
						'description'    => utf8_substr(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
						'action_percent' => $action_percent,
						'price'          => $price,
						'special'        => $special,
						'tax'            => $tax,
						'href'           => $this->url->link('product/product', 'product_id=' . $product_info['product_id'])
					);
				}
			}
		}

		if ($data['products']) {
			return $this->load->view('extension/module/featured_custom', $data);
		}
	}
}