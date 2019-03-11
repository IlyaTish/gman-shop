<?php
 class ControllerCommonKatalog extends Controller {
  public function index() {
    $this->language->load('common/katalog');

    $this->document->setTitle($this->language->get('heading_title'));

    $data['breadcrumbs'] = array();

    $data['breadcrumbs'][] = array(
       'text' => $this->language->get('text_home'),
       'href' => $this->url->link('common/home')
    );

    $data['breadcrumbs'][] = array(
      'text' => $this->language->get('catalog'),
      'href' => $this->url->link('common/katalog', '', true)
    );

    $data['breadcrumbs'][] = array(
      'text' => $this->language->get('catalog'),
      'href' => $this->url->link('common/katalog')
    );

    $data['footer'] = $this->load->controller('common/footer');
    $data['header'] = $this->load->controller('common/header');

    $this->response->setOutput($this->load->view('common/katalog', $data));
  }
}?>