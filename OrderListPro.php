<?php
class ControllerSaleOrderListPro extends Controller {
    private $error = array();

    public function index() {

        $sort_url = $page_url = $url = '';

        if (isset($this->request->get['filter_order_id'])) {
            $sort_url = $page_url = $url .= '&filter_order_id=' . $this->request->get['filter_order_id'];
            $filter_order_id = $this->request->get['filter_order_id'];
        } else {
            $filter_order_id = '';
        }

        if (isset($this->request->get['filter_customer'])) {
            $sort_url = $page_url = $url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
            $filter_customer = $this->request->get['filter_customer'];
        } else {
            $filter_customer = '';
        }

        if (isset($this->request->get['filter_order_status'])) {
            $sort_url = $page_url = $url .= '&filter_order_status=' . $this->request->get['filter_order_status'];
            $filter_order_status = $this->request->get['filter_order_status'];
        } else {
            $filter_order_status = '';
        }
    
        if (isset($this->request->get['filter_order_status_id'])) {
            $sort_url = $page_url = $url .= '&filter_order_status_id=' . $this->request->get['filter_order_status_id'];
            $filter_order_status_id = $this->request->get['filter_order_status_id'];
        } else {
            $filter_order_status_id = '';
        }
            
        /*if (isset($this->request->get['filter_total'])) {
            $sort_url = $page_url = $url .= '&filter_total=' . $this->request->get['filter_total'];
            $filter_total = $this->request->get['filter_total'];
        } else {
            $filter_total = '';
        }*/

        if (isset($this->request->get['filter_total_from'])) {
            $sort_url = $page_url = $url .= '&filter_total_from=' . $this->request->get['filter_total_from'];
            $filter_total_from = $this->request->get['filter_total_from'];
        } else {
            $filter_total_from = '';
        }

        if (isset($this->request->get['filter_total_to'])) {
            $sort_url = $page_url = $url .= '&filter_total_to=' . $this->request->get['filter_total_to'];
            $filter_total_to = $this->request->get['filter_total_to'];
        } else {
            $filter_total_to = '';
        }

        if (isset($this->request->get['filter_date_added'])) {
            $sort_url = $page_url = $url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
            $filter_date_added = $this->request->get['filter_date_added'];
        } else {
            $filter_date_added = '';
        }

        if (isset($this->request->get['filter_date_modified'])) {
            $sort_url = $page_url = $url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
            $filter_date_modified = $this->request->get['filter_date_modified'];
        } else {
            $filter_date_modified = '';
        }

        if (isset($this->request->get['filter_comment'])) {
            $sort_url = $page_url = $url .= '&filter_comment=' . urlencode(html_entity_decode($this->request->get['filter_comment'], ENT_QUOTES, 'UTF-8'));
            $filter_comment = $this->request->get['filter_comment'];
        } else {
            $filter_comment = '';
        }

        if (isset($this->request->get['filter_order_comment'])) {
            $sort_url = $page_url = $url .= '&filter_order_comment=' . urlencode(html_entity_decode($this->request->get['filter_order_comment'], ENT_QUOTES, 'UTF-8'));
            $filter_order_comment = $this->request->get['filter_order_comment'];
        } else {
            $filter_order_comment = '';
        }

        if (isset($this->request->get['filter_customer_comment'])) {
            $sort_url = $page_url = $url .= '&filter_customer_comment=' . urlencode(html_entity_decode($this->request->get['filter_customer_comment'], ENT_QUOTES, 'UTF-8'));
            $filter_customer_comment = $this->request->get['filter_customer_comment'];
        } else {
            $filter_customer_comment = '';
        }

        if (isset($this->request->get['filter_product_comment'])) {
            $sort_url = $page_url = $url .= '&filter_product_comment=' . urlencode(html_entity_decode($this->request->get['filter_product_comment'], ENT_QUOTES, 'UTF-8'));
            $filter_product_comment = $this->request->get['filter_product_comment'];
        } else {
            $filter_product_comment = '';
        }

        if (isset($this->request->get['filter_product_name'])) {
            $sort_url = $page_url = $url .= '&filter_product_name=' . urlencode(html_entity_decode($this->request->get['filter_product_name'], ENT_QUOTES, 'UTF-8'));
            $filter_product_name = $this->request->get['filter_product_name'];
        } else {
            $filter_product_name = '';
        }

        if (isset($this->request->get['filter_product_model'])) {
            $sort_url = $page_url = $url .= '&filter_product_model=' . urlencode(html_entity_decode($this->request->get['filter_product_model'], ENT_QUOTES, 'UTF-8'));
            $filter_product_model = $this->request->get['filter_product_model'];
        } else {
            $filter_product_model = '';
        }

        if (isset($this->request->get['filter_product_sku'])) {
            $sort_url = $page_url = $url .= '&filter_product_sku=' . urlencode(html_entity_decode($this->request->get['filter_product_sku'], ENT_QUOTES, 'UTF-8'));
            $filter_product_sku = $this->request->get['filter_product_sku'];
        } else {
            $filter_product_sku = '';
        }

        if (isset($this->request->get['filter_product_upc'])) {
            $sort_url = $page_url = $url .= '&filter_product_upc=' . urlencode(html_entity_decode($this->request->get['filter_product_upc'], ENT_QUOTES, 'UTF-8'));
            $filter_product_upc = $this->request->get['filter_product_upc'];
        } else {
            $filter_product_upc = '';
        }

        if (isset($this->request->get['filter_product_ean'])) {
            $sort_url = $page_url = $url .= '&filter_product_ean=' . urlencode(html_entity_decode($this->request->get['filter_product_ean'], ENT_QUOTES, 'UTF-8'));
            $filter_product_ean = $this->request->get['filter_product_ean'];
        } else {
            $filter_product_ean = '';
        }

        if (isset($this->request->get['filter_product_jan'])) {
            $sort_url = $page_url = $url .= '&filter_product_jan=' . urlencode(html_entity_decode($this->request->get['filter_product_jan'], ENT_QUOTES, 'UTF-8'));
            $filter_product_jan = $this->request->get['filter_product_jan'];
        } else {
            $filter_product_jan = '';
        }

        if (isset($this->request->get['filter_product_isbn'])) {
            $sort_url = $page_url = $url .= '&filter_product_isbn=' . urlencode(html_entity_decode($this->request->get['filter_product_isbn'], ENT_QUOTES, 'UTF-8'));
            $filter_product_isbn = $this->request->get['filter_product_isbn'];
        } else {
            $filter_product_isbn = '';
        }

        if (isset($this->request->get['filter_product_mpn'])) {
            $sort_url = $page_url = $url .= '&filter_product_mpn=' . urlencode(html_entity_decode($this->request->get['filter_product_mpn'], ENT_QUOTES, 'UTF-8'));
            $filter_product_mpn = $this->request->get['filter_product_mpn'];
        } else {
            $filter_product_mpn = '';
        }

        if (isset($this->request->get['filter_product_location'])) {
            $sort_url = $page_url = $url .= '&filter_product_location=' . urlencode(html_entity_decode($this->request->get['filter_product_location'], ENT_QUOTES, 'UTF-8'));
            $filter_product_location = $this->request->get['filter_product_location'];
        } else {
            $filter_product_location = '';
        }

        if (isset($this->request->get['filter_company'])) {
            $sort_url = $page_url = $url .= '&filter_company=' . urlencode(html_entity_decode($this->request->get['filter_company'], ENT_QUOTES, 'UTF-8'));
            $filter_company = $this->request->get['filter_company'];
        } else {
            $filter_company = '';
        }

        if (isset($this->request->get['filter_country'])) {
            $sort_url = $page_url = $url .= '&filter_country=' . $this->request->get['filter_country'];
            $filter_country = $this->request->get['filter_country'];
        } else {
            $filter_country = '';
        }

        if (isset($this->request->get['filter_zone'])) {
            $sort_url = $page_url = $url .= '&filter_zone=' . $this->request->get['filter_zone'];
            $filter_zone = $this->request->get['filter_zone'];
        } else {
            $filter_zone = '';
        }

        if (isset($this->request->get['filter_city'])) {
            $sort_url = $page_url = $url .= '&filter_city=' . urlencode(html_entity_decode($this->request->get['filter_city'], ENT_QUOTES, 'UTF-8'));
            $filter_city = $this->request->get['filter_city'];
        } else {
            $filter_city = '';
        }

        if (isset($this->request->get['filter_address_1'])) {
            $sort_url = $page_url = $url .= '&filter_address_1=' . urlencode(html_entity_decode($this->request->get['filter_address_1'], ENT_QUOTES, 'UTF-8'));
            $filter_address_1 = $this->request->get['filter_address_1'];
        } else {
            $filter_address_1 = '';
        }

        if (isset($this->request->get['filter_address_2'])) {
            $sort_url = $page_url = $url .= '&filter_address_2=' . urlencode(html_entity_decode($this->request->get['filter_address_2'], ENT_QUOTES, 'UTF-8'));
            $filter_address_2 = $this->request->get['filter_address_2'];
        } else {
            $filter_address_2 = '';
        }

        if (isset($this->request->get['filter_postcode'])) {
            $sort_url = $page_url = $url .= '&filter_postcode=' . urlencode(html_entity_decode($this->request->get['filter_postcode'], ENT_QUOTES, 'UTF-8'));
            $filter_postcode = $this->request->get['filter_postcode'];
        } else {
            $filter_postcode = '';
        }

        if (isset($this->request->get['filter_date_own'])) {
            $sort_url = $page_url = $url .= '&filter_date_own=' . $this->request->get['filter_date_own'];
            $filter_date_own = $this->request->get['filter_date_own'];
        } else {
            $filter_date_own = '';
        }

        if (isset($this->request->get['filter_status_payment'])) {
            $sort_url = $page_url = $url .= '&filter_status_payment=' . $this->request->get['filter_status_payment'];
            $filter_status_payment = $this->request->get['filter_status_payment'];
        } else {
            $filter_status_payment = '';
        }

        if (isset($this->request->get['filter_payments'])) {
            $sort_url = $page_url = $url .= '&filter_payments=' . $this->request->get['filter_payments'];
            $filter_payments = $this->request->get['filter_payments'];
        } else {
            $filter_payments = '';
        }

        if (isset($this->request->get['filter_customer_groups'])) {
            $sort_url = $page_url = $url .= '&filter_customer_groups=' . $this->request->get['filter_customer_groups'];
            $filter_customer_groups = $this->request->get['filter_customer_groups'];
        } else {
            $filter_customer_groups = '';
        }

        if (isset($this->request->get['filter_telephone'])) {
            $sort_url = $page_url = $url .= '&filter_telephone=' . urlencode(html_entity_decode($this->request->get['filter_telephone'], ENT_QUOTES, 'UTF-8'));
            $filter_telephone = $this->request->get['filter_telephone'];
        } else {
            $filter_telephone = '';
        }

        if (isset($this->request->get['filter_email'])) {
            $sort_url = $page_url = $url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_email'], ENT_QUOTES, 'UTF-8'));
            $filter_email = $this->request->get['filter_email'];
        } else {
            $filter_email = '';
        }

        if (isset($this->request->get['filter_shippings'])) {
            $sort_url = $page_url = $url .= '&filter_shippings=' . $this->request->get['filter_shippings'];
            $filter_shippings = $this->request->get['filter_shippings'];
        } else {
            $filter_shippings = '';
        }

        if (isset($this->request->get['sort'])) {
            $page_url = $url .= '&sort=' . $this->request->get['sort'];
            $sort = $this->request->get['sort'];
        } else {
            $sort = 'o.order_id';
        }

        if (isset($this->request->get['order'])) {
            $page_url = $url .= '&order=' . $this->request->get['order'];
            $order = $this->request->get['order'];
        } else {
            $order = 'DESC';
        }

        if (isset($this->request->get['page'])) {
            $sort_url .= '&page=' . $this->request->get['page'];
            $url .= '&page=' . $this->request->get['page'];
            $page = (int)$this->request->get['page'];
        } else {
            $page = 1;
        }

        if (!$this->config->get('module_OrderListPro_status') || ($this->config->get('module_OrderListPro_status') && !$this->validateKey())) {
            $this->response->redirect($this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
        }

        $this->document->addScript('view/javascript/jquery/magnific/jquery.magnific-popup.min.js');
        $this->document->addStyle('view/javascript/jquery/magnific/magnific-popup.css');

        $this->document->addScript('view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
        $this->document->addStyle('view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');

        $this->document->addScript('view/javascript/OrderListPro/select/bootstrap-select.min.js');
        $this->document->addStyle('view/javascript/OrderListPro/select/bootstrap-select.min.css');

        $this->document->addStyle('view/javascript/OrderListPro/style.css?v=1.8');

        $this->load->model('sale/OrderListPro');

        $this->load->language('sale/OrderListPro');

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('sale/OrderListPro', 'user_token=' . $this->session->data['user_token'] . $url, true)
        );

        $this->document->setTitle($this->language->get('heading_title'));

        
        $this->load->model('tool/image');

        $OrderListPro_setting = $this->config->get('module_OrderListPro_setting');

        $data['user_token'] = $this->session->data['user_token'];

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->session->data['success'])) {
            $data['success'] = $this->session->data['success'];

            unset($this->session->data['success']);
        } else {
            $data['success'] = '';
        }
        
        if (isset($this->request->post['selected'])) {
            $data['selected'] = (array)$this->request->post['selected'];
        } else {
            $data['selected'] = array();
        }

        $data['filter_order_id'] = $filter_order_id;
        $data['filter_customer'] = $filter_customer;
        $data['filter_order_status'] = explode(",",$filter_order_status);
        $data['filter_order_status_id'] = $filter_order_status_id;
        /*$data['filter_total'] = $filter_total;*/
        $data['filter_total_to'] = $filter_total_to;
        $data['filter_total_from'] = $filter_total_from;
        $data['filter_date_added'] = $filter_date_added;
        $data['filter_date_modified'] = $filter_date_modified;
        $data['filter_comment'] = $filter_comment;
        $data['filter_order_comment'] = $filter_order_comment;
        $data['filter_customer_comment'] = $filter_customer_comment;
        $data['filter_product_comment'] = $filter_product_comment;
        $data['filter_product_name'] = $filter_product_name;
        $data['filter_product_model'] = $filter_product_model;
        $data['filter_product_sku'] = $filter_product_sku;
        $data['filter_product_upc'] = $filter_product_upc;
        $data['filter_product_ean'] = $filter_product_ean;
        $data['filter_product_jan'] = $filter_product_jan;
        $data['filter_product_isbn'] = $filter_product_isbn;
        $data['filter_product_mpn'] = $filter_product_mpn;
        $data['filter_product_location'] = $filter_product_location;
        $data['filter_company'] = $filter_company;
        $data['filter_country'] = $filter_country;
        $data['filter_zone'] = $filter_zone;
        $data['filter_city'] = $filter_city;
        $data['filter_address_1'] = $filter_address_1;
        $data['filter_address_2'] = $filter_address_2;
        $data['filter_postcode'] = $filter_postcode;
        $data['filter_date_own'] = $filter_date_own;
        $data['filter_customer_groups'] = explode(",",$filter_customer_groups);
        $data['filter_telephone'] = $filter_telephone;
        $data['filter_email'] = $filter_email;
        $data['filter_status_payment'] = $filter_status_payment;
        $data['filter_shippings'] = explode(",",$filter_shippings);
        $data['filter_payments'] = explode(",",$filter_payments);

        $data['sort'] = $sort;
        $data['order'] = $order;

        $this->load->model('localisation/order_status');
        $this->load->model('localisation/country');

        $data['countries'] = $this->model_localisation_country->getCountries();
        $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
        $data['status_color'] = $OrderListPro_setting['color'];
        $data['status_payment'] = isset($OrderListPro_setting['payments']) ? $OrderListPro_setting['payments'] : false;
        $data['date_own'] = $OrderListPro_setting['date_own'];
        $data['comment'] = $OrderListPro_setting['comment'];
        $data['sms_status'] = $OrderListPro_setting['sms_status'];
        $data['product_limit'] = $OrderListPro_setting['product'];
        $data['status_model'] = isset($OrderListPro_setting['model']) ? true : false;
        $data['status_sku'] = isset($OrderListPro_setting['sku']) ? true : false;
        $data['status_upc'] = isset($OrderListPro_setting['upc']) ? true : false;
        $data['status_ean'] = isset($OrderListPro_setting['ean']) ? true : false;
        $data['status_jan'] = isset($OrderListPro_setting['jan']) ? true : false;
        $data['status_isbn'] = isset($OrderListPro_setting['isbn']) ? true : false;
        $data['status_mpn'] = isset($OrderListPro_setting['mpn']) ? true : false;
        $data['status_location'] = isset($OrderListPro_setting['location']) ? true : false;
        
        $language_id = $this->config->get('config_language_id');

        $data['quick_filters'] = array();

        $date_now = date("Y-m-d");

        if (isset($OrderListPro_setting['filter'])) {
            foreach ($OrderListPro_setting['filter'] as $filter) {
                $quick_filter_url = '';
                if (isset($filter['status'])) {
                    $quick_filter_url .= '&filter_order_status=' . $filter['status'];
                }
                if (isset($filter['date_add'])) {
                    $date_add = date("Y-m-d", strtotime($date_now.'- ' . (int)$filter['date_add'] . ' days'));
                    $quick_filter_url .= '&filter_date_added=' . $date_add;
                }
                if (isset($filter['date_modified'])) {
                    $date_modified = date("Y-m-d", strtotime($date_now.'- ' . (int)$filter['date_modified'] . ' days'));
                    $quick_filter_url .= '&filter_date_modified=' . $date_modified;
                }
                if ($data['date_own'] && isset($filter['date_own'])) {
                    $date_own = date("Y-m-d", strtotime($date_now.'- ' . (int)$filter['date_own'] . ' days'));
                    $quick_filter_url .= '&filter_date_own=' . $date_own;
                }
                if (isset($filter['groups'])) {
                    $quick_filter_url .= '&filter_customer_groups=' . $filter['groups'];
                }
                if (isset($filter['payments'])) {
                    $quick_filter_url .= '&filter_payments=' . $filter['payments'];
                }
                if ($data['status_payment'] && isset($filter['status_payment'])) {
                    $quick_filter_url .= '&filter_status_payment=' . $filter['status_payment'];
                }
                if (isset($filter['shippings'])) {
                    $quick_filter_url .= '&filter_shippings=' . $filter['shippings'];
                }
                if (isset($filter['company'])) {
                    $quick_filter_url .= '&filter_company=' . urlencode(html_entity_decode($filter['company'], ENT_QUOTES, 'UTF-8'));
                }
                if (isset($filter['country'])) {
                    $quick_filter_url .= '&filter_country=' . $filter['country'];
                }
                if (isset($filter['zone'])) {
                    $quick_filter_url .= '&filter_zone=' . $filter['zone'];
                }
                if (isset($filter['city'])) {
                    $quick_filter_url .= '&filter_city=' . urlencode(html_entity_decode($filter['city'], ENT_QUOTES, 'UTF-8'));
                }

                if (!$data['date_own'] && $filter['sort'] == 'o.date_own') {
                    $filter['sort'] = 'o.order_id';
                }
                $quick_filter = $this->url->link('sale/OrderListPro', 'user_token=' . $this->session->data['user_token'] . '&sort=' . $filter['sort'] . '&order=' . $filter['order'] . $quick_filter_url, true);
                $data['quick_filters'][] = array(
                    'name'          => $filter['name'][$language_id],
                    'href'          => $quick_filter,
                );
            }
        }

        $data['invoice'] = $this->url->link('sale/OrderListPro/invoice', 'user_token=' . $this->session->data['user_token'], true);
        $data['add'] = $this->url->link('sale/order/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
        $data['delete'] = str_replace('&amp;', '&', $this->url->link('sale/OrderListPro/delete', 'user_token=' . $this->session->data['user_token'] . $url, true));

        $data['customer_groups'] = $this->model_sale_OrderListPro->getCustomerGroups();

        $data['orders'] = array();

        $filter_data = array(
            'filter_order_id'        => $filter_order_id,
            'filter_customer'        => $filter_customer,
            'filter_order_status'    => $filter_order_status,
            'filter_order_status_id' => $filter_order_status_id,
            /*'filter_total'           => $filter_total,*/
            'filter_total_from'      => $filter_total_from,
            'filter_total_to'        => $filter_total_to,
            'filter_date_added'      => $filter_date_added,
            'filter_date_modified'   => $filter_date_modified,
            'sort'                   => $sort,
            'order'                  => $order,
            'start'                  => ($page - 1) * $OrderListPro_setting['limit'],
            'limit'                  => $OrderListPro_setting['limit'],
            'filter_comment'         => $filter_comment,
            'filter_order_comment'   => $filter_order_comment,
            'filter_customer_comment'=> $filter_customer_comment,
            'filter_product_comment' => $filter_product_comment,
            'filter_product_name'    => $filter_product_name,
            'filter_product_model'   => $filter_product_model,
            'filter_product_sku'     => $filter_product_sku,
            'filter_product_upc'     => $filter_product_upc,
            'filter_product_ean'     => $filter_product_ean,
            'filter_product_jan'     => $filter_product_jan,
            'filter_product_isbn'    => $filter_product_isbn,
            'filter_product_mpn'     => $filter_product_mpn,
            'filter_product_location'=> $filter_product_location,
            'filter_company'         => $filter_company,
            'filter_country'         => $filter_country,
            'filter_zone'            => $filter_zone,
            'filter_city'            => $filter_city,
            'filter_address_1'       => $filter_address_1,
            'filter_address_2'       => $filter_address_2,
            'filter_postcode'        => $filter_postcode,
            'filter_date_own'        => $filter_date_own,
            'filter_customer_groups' => $filter_customer_groups,
            'filter_shippings'       => $filter_shippings,
            'filter_payments'        => $filter_payments,
            'filter_status_payment'  => $filter_status_payment,
            'filter_telephone'       => preg_replace('/[^0-9]/', '', $filter_telephone),
            'filter_email'           => $filter_email
        );

        $order_total = $this->model_sale_OrderListPro->getTotalOrders($filter_data);

        $results = $this->model_sale_OrderListPro->getOrders($filter_data);

        foreach ($results as $result) {

            $customer_group_info = $this->model_sale_OrderListPro->getCustomerGroup($result['customer_group_id']);

            if ($customer_group_info) {
                $customer_group = $customer_group_info['name'];
            } else {
                $customer_group = false;
            }

            if ($result['customer_id']) {
                $customer_href = $this->url->link('customer/customer/edit', 'user_token=' . $this->session->data['user_token'] . '&customer_id=' . $result['customer_id'], true);
            } else {
                $customer_href = false;
            }

            $adress_variables = array(
                'shipping_firstname'    => $result['shipping_firstname'],
                'shipping_lastname'     => $result['shipping_lastname'],
                'shipping_company'      => $result['shipping_company'],
                'shipping_address_1'    => $result['shipping_address_1'],
                'shipping_address_2'    => $result['shipping_address_2'],
                'shipping_city'         => $result['shipping_city'],
                'shipping_postcode'     => $result['shipping_postcode'],
                'shipping_country'      => $result['shipping_country'],
                'shipping_zone'         => $result['shipping_zone'],
                'payment_firstname'     => $result['payment_firstname'],
                'payment_lastname'      => $result['payment_lastname'],
                'payment_company'       => $result['payment_company'],
                'payment_address_1'     => $result['payment_address_1'],
                'payment_address_2'     => $result['payment_address_2'],
                'payment_city'          => $result['payment_city'],
                'payment_postcode'      => $result['payment_postcode'],
                'payment_country'       => $result['payment_country'],
                'payment_zone'          => $result['payment_zone'],
            );

            $adress = $OrderListPro_setting['format'];

            foreach ($adress_variables as $key_adress => $adress_value) {
                $adress = str_replace('{' . $key_adress . '}', $adress_value, $adress);
            }

            $product_data = array();

            $products = $this->model_sale_OrderListPro->getOrderProducts($result['order_id']);

            foreach ($products as $product) {
                $option_data = array();

                $options = $this->model_sale_OrderListPro->getOrderOptions($result['order_id'], $product['order_product_id']);

                foreach ($options as $option) {
                    if ($option['type'] != 'file') {
                        $value = $option['value'];
                    } else {
                        $upload_info = $this->model_sale_OrderListPro->getUploadByCode($option['value']);

                        if ($upload_info) {
                            $value = $upload_info['name'];
                        } else {
                            $value = '';
                        }
                    }

                    $option_data[] = array(
                        'name'  => $option['name'],
                        'value' => $value
                    );
                }

                $product_info = $this->model_sale_OrderListPro->getProductInfo($product['product_id']);

                if (is_file(DIR_IMAGE . $product_info['image'])) {
                    $image = $this->model_tool_image->resize($product_info['image'], 40, 40);
                } else {
                    $image = $this->model_tool_image->resize('no_image.png', 40, 40);
                }

                $product_data[] = array(
                    'order_product_id'    => $product['order_product_id'],
                    'image'    => $image,
                    'name'     => $product['name'],
                    'model'    => $product['model'],
                    'sku'      => $product_info['sku'],
                    'upc'      => $product_info['upc'],
                    'ean'      => $product_info['ean'],
                    'jan'      => $product_info['jan'],
                    'isbn'     => $product_info['isbn'],
                    'mpn'      => $product_info['mpn'],
                    'location' => $product_info['location'],
                    'option'   => $option_data,
                    'quantity' => $product['quantity'],
                    'comment'  => isset($product['comment']) ? $product['comment'] : false,
                    'price'    => $this->currency->format($product['price'] + ($this->config->get('config_tax') ? $product['tax'] : 0), $result['currency_code'], $result['currency_value']),
                    'total'    => $this->currency->format($product['total'] + ($this->config->get('config_tax') ? ($product['tax'] * $product['quantity']) : 0), $result['currency_code'], $result['currency_value']),
                    'href_shop'  => HTTP_CATALOG . 'index.php?route=product/product&product_id=' . $product['product_id'],
                    'edit'       => $this->url->link('catalog/product/edit', 'user_token=' . $this->session->data['user_token'] . '&product_id=' . $product['product_id'], true)
                );
            }

            $vouchers = array();

            $order_vouchers = $this->model_sale_OrderListPro->getOrderVouchers($result['order_id']);

            foreach ($order_vouchers as $voucher) {
                $vouchers[] = array(
                    'description' => $voucher['description'],
                    'amount'      => $this->currency->format($voucher['amount'], $result['currency_code'], $result['currency_value']),
                    'href'        => $this->url->link('sale/voucher/edit', 'user_token=' . $this->session->data['user_token'] . '&voucher_id=' . $voucher['voucher_id'], true)
                );
            }

            $totals = array();

            $order_totals = $this->model_sale_OrderListPro->getOrderTotals($result['order_id']);

            foreach ($order_totals as $total) {
                $totals[] = array(
                    'title' => $total['title'],
                    'text'  => $this->currency->format($total['value'], $result['currency_code'], $result['currency_value'])
                );
            }

            $date_own = $comment_order = $comment_customer = '';

            $phone = preg_replace('/[^0-9]/', '', $result['telephone']);

            if ($phone) {
                $comment_customer_info = $this->model_sale_OrderListPro->getCommentCustomer($phone);
                if ($comment_customer_info) {
                    $comment_customer = $comment_customer_info['comment'];
                }
                $order_other = $this->model_sale_OrderListPro->getTotalOtherOrders($phone, $result['order_id']);
            }  else {
                $order_other = false;
            }

            $comment_order_info = $this->model_sale_OrderListPro->getCommentOrder($result['order_id']);

            if ($comment_order_info) {
                $comment_order = $comment_order_info['comment'];
            }

            if (isset($result['date_own'])) {
                $date_own = $result['date_own'];
            }

            $data['orders'][] = array(
                'order_id'          => $result['order_id'],
                'customer'          => $result['customer'],
                'customer_href'     => $customer_href,
                'order_other'       => $order_other,
                'customer_group'    => $customer_group,
                'telephone'         => $result['telephone'],
                'email'             => $result['email'],
                'phone'             => $phone,
                'phone'             => $phone,
                'comment_customer'  => $comment_customer,
                'comment_order'     => $comment_order,
                'shipping_code'     => $result['shipping_code'],
                'shipping_method'   => $result['shipping_method'],
                'adress'            => $adress,
                'payment_method'    => $result['payment_method'],
                'payment_code'      => $result['payment_code'],
                'payment_status'    => isset($result['payment_status']) ? $result['payment_status'] : false,
                'vouchers'          => $vouchers,
                'totals'            => $totals,
                'products'          => $product_data,
                'comment'           => $result['comment'],
                'order_status_id'   => $result['order_status_id'],
                'store_id'          => $result['store_id'],
                'order_status'      => $result['order_status'] ? $result['order_status'] : $this->language->get('text_missing'),
                'total'             => $this->currency->format($result['total'], $result['currency_code'], $result['currency_value']),
                'date_added'        => date($OrderListPro_setting['date'], strtotime($result['date_added'])),
                'date_modified'     => date($OrderListPro_setting['date'], strtotime($result['date_modified'])),
                'date_own'          => ($date_own != '0000-00-00') ? $date_own : '',
                'view'              => $this->url->link('sale/order/info', 'user_token=' . $this->session->data['user_token'] . '&order_id=' . $result['order_id'] . $url, true),
                'edit'              => $this->url->link('sale/order/edit', 'user_token=' . $this->session->data['user_token'] . '&order_id=' . $result['order_id'] . $url, true)
            );
        }

        if ($order == 'ASC') {
            $sort_url .= '&order=DESC';
        } else {
            $sort_url .= '&order=ASC';
        }

        $data['clean_filter'] = $this->url->link('sale/OrderListPro', 'user_token=' . $this->session->data['user_token'], true);
        $data['sort_order'] = $this->url->link('sale/OrderListPro', 'user_token=' . $this->session->data['user_token'] . '&sort=o.order_id' . $sort_url, true);
        $data['sort_customer'] = $this->url->link('sale/OrderListPro', 'user_token=' . $this->session->data['user_token'] . '&sort=customer' . $sort_url, true);
        $data['sort_status'] = $this->url->link('sale/OrderListPro', 'user_token=' . $this->session->data['user_token'] . '&sort=order_status' . $sort_url, true);
        $data['sort_total'] = $this->url->link('sale/OrderListPro', 'user_token=' . $this->session->data['user_token'] . '&sort=o.total' . $sort_url, true);
        $data['sort_date_added'] = $this->url->link('sale/OrderListPro', 'user_token=' . $this->session->data['user_token'] . '&sort=o.date_added' . $sort_url, true);
        $data['sort_date_modified'] = $this->url->link('sale/OrderListPro', 'user_token=' . $this->session->data['user_token'] . '&sort=o.date_modified' . $sort_url, true);
        $data['sort_date_own'] = $this->url->link('sale/OrderListPro', 'user_token=' . $this->session->data['user_token'] . '&sort=o.date_own' . $sort_url, true);
        $data['sort_status_payment'] = $this->url->link('sale/OrderListPro', 'user_token=' . $this->session->data['user_token'] . '&sort=o.payment_status' . $sort_url, true);
        $data['sort_payments'] = $this->url->link('sale/OrderListPro', 'user_token=' . $this->session->data['user_token'] . '&sort=o.payment_code' . $sort_url, true);
        $data['sort_shippings'] = $this->url->link('sale/OrderListPro', 'user_token=' . $this->session->data['user_token'] . '&sort=o.shipping_code' . $sort_url, true);
        $data['sort_customer_group'] = $this->url->link('sale/OrderListPro', 'user_token=' . $this->session->data['user_token'] . '&sort=o.customer_group_id' . $sort_url, true);

        $pagination = new Pagination();
        $pagination->total = $order_total;
        $pagination->page = $page;
        $pagination->limit = $OrderListPro_setting['limit'];
        $pagination->url = $this->url->link('sale/OrderListPro', 'user_token=' . $this->session->data['user_token'] . $page_url . '&page={page}', true);

        $data['pagination'] = $pagination->render();

        $data['results'] = sprintf($this->language->get('text_pagination'), ($order_total) ? (($page - 1) * $OrderListPro_setting['limit']) + 1 : 0, ((($page - 1) * $OrderListPro_setting['limit']) > ($order_total - $OrderListPro_setting['limit'])) ? $order_total : ((($page - 1) * $OrderListPro_setting['limit']) + $OrderListPro_setting['limit']), $order_total, ceil($order_total / $OrderListPro_setting['limit']));

        // API login
        $data['catalog'] = $this->request->server['HTTPS'] ? HTTPS_CATALOG : HTTP_CATALOG;
        
        // API login
        $this->load->model('user/api');

        $api_info = $this->model_user_api->getApi($this->config->get('config_api_id'));

        if ($api_info && $this->user->hasPermission('modify', 'sale/OrderListPro')) {
            $session = new Session($this->config->get('session_engine'), $this->registry);
            
            $session->start();
                    
            $this->model_user_api->deleteApiSessionBySessionId($session->getId());
            
            $this->model_user_api->addApiSession($api_info['api_id'], $session->getId(), $this->request->server['REMOTE_ADDR']);
            
            $session->data['api_id'] = $api_info['api_id'];

            $data['api_token'] = $session->getId();
        } else {
            $data['api_token'] = '';
        }

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('sale/OrderListPro', $data));
    }

    public function invoice() {
        if ($this->request->server['HTTPS']) {
            $server = HTTPS_CATALOG;
            $data['base'] = HTTPS_SERVER;
        } else {
            $server = HTTP_CATALOG;
            $data['base'] = HTTP_SERVER;
        }

        $this->load->model('sale/order');
        $this->load->model('catalog/product');
        $this->load->model('setting/setting');
        $this->load->language('sale/invoicePro');
        
        if (is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
            $data['logo'] = $server . 'image/' . $this->config->get('config_logo');
        } else {
            $data['logo'] = '';
        }
            
        $data['direction'] = $this->language->get('direction');
        $data['lang'] = $this->language->get('code');

        $data['orders'] = array();

        $orders = array();

        if (isset($this->request->post['selected'])) {
            $orders = $this->request->post['selected'];
        }

        foreach ($orders as $order_id) {
            $order_info = $this->model_sale_order->getOrder($order_id);

            // Make sure there is a shipping method
            if ($order_info && $order_info['shipping_code']) {
                $store_info = $this->model_setting_setting->getSetting('config', $order_info['store_id']);

                if ($store_info) {
                    $store_address = $store_info['config_address'];
                    $store_email = $store_info['config_email'];
                    $store_telephone = $store_info['config_telephone'];
                } else {
                    $store_address = $this->config->get('config_address');
                    $store_email = $this->config->get('config_email');
                    $store_telephone = $this->config->get('config_telephone');
                }

                if ($order_info['invoice_no']) {
                    $invoice_no = $order_info['invoice_prefix'] . $order_info['invoice_no'];
                } else {
                    $invoice_no = '';
                }

                if ($order_info['shipping_address_format']) {
                    $format = $order_info['shipping_address_format'];
                } else {
                    $format = '{firstname} {lastname}' . "\n" . '{company}' . "\n" . '{address_1}' . "\n" . '{address_2}' . "\n" . '{city} {postcode}' . "\n" . '{zone}' . "\n" . '{country}';
                }

                $find = array(
                    '{firstname}',
                    '{lastname}',
                    '{company}',
                    '{address_1}',
                    '{address_2}',
                    '{city}',
                    '{postcode}',
                    '{zone}',
                    '{zone_code}',
                    '{country}'
                );

                $replace = array(
                    'firstname' => $order_info['shipping_firstname'],
                    'lastname'  => $order_info['shipping_lastname'],
                    'company'   => $order_info['shipping_company'],
                    'address_1' => $order_info['shipping_address_1'],
                    'address_2' => $order_info['shipping_address_2'],
                    'city'      => $order_info['shipping_city'],
                    'postcode'  => $order_info['shipping_postcode'],
                    'zone'      => $order_info['shipping_zone'],
                    'zone_code' => $order_info['shipping_zone_code'],
                    'country'   => $order_info['shipping_country']
                );

                $shipping_address = str_replace(array("\r\n", "\r", "\n"), '<br />', preg_replace(array("/\s\s+/", "/\r\r+/", "/\n\n+/"), '<br />', trim(str_replace($find, $replace, $format))));

                $this->load->model('tool/upload');

                $product_data = array();

                $products = $this->model_sale_order->getOrderProducts($order_id);

                foreach ($products as $product) {
                    $option_weight = 0;

                    $product_info = $this->model_catalog_product->getProduct($product['product_id']);

                    if ($product_info) {
                        $option_data = array();

                        $options = $this->model_sale_order->getOrderOptions($order_id, $product['order_product_id']);

                        foreach ($options as $option) {
                            if ($option['type'] != 'file') {
                                $value = $option['value'];
                            } else {
                                $upload_info = $this->model_tool_upload->getUploadByCode($option['value']);

                                if ($upload_info) {
                                    $value = $upload_info['name'];
                                } else {
                                    $value = '';
                                }
                            }

                            $option_data[] = array(
                                'name'  => $option['name'],
                                'value' => $value
                            );

                            $product_option_value_info = $this->model_catalog_product->getProductOptionValue($product['product_id'], $option['product_option_value_id']);

                            if (!empty($product_option_value_info['weight'])) {
                                if ($product_option_value_info['weight_prefix'] == '+') {
                                    $option_weight += $product_option_value_info['weight'];
                                } elseif ($product_option_value_info['weight_prefix'] == '-') {
                                    $option_weight -= $product_option_value_info['weight'];
                                }
                            }
                        }

                        $product_data[] = array(
                            'name'     => $product_info['name'],
                            'model'    => $product_info['model'],
                            'option'   => $option_data,
                            'quantity' => $product['quantity'],
                            'location' => $product_info['location'],
                            'sku'      => $product_info['sku'],
                            'upc'      => $product_info['upc'],
                            'ean'      => $product_info['ean'],
                            'jan'      => $product_info['jan'],
                            'isbn'     => $product_info['isbn'],
                            'mpn'      => $product_info['mpn'],
                            'weight'   => $this->weight->format(($product_info['weight'] + (float)$option_weight) * $product['quantity'], $product_info['weight_class_id'], $this->language->get('decimal_point'), $this->language->get('thousand_point')),
                            'price'    => $this->currency->format($product['price'] + ($this->config->get('config_tax') ? $product['tax'] : 0), $order_info['currency_code'], $order_info['currency_value']),
                            'total'    => $this->currency->format($product['total'] + ($this->config->get('config_tax') ? ($product['tax'] * $product['quantity']) : 0), $order_info['currency_code'], $order_info['currency_value'])
                        );
                    }
                }

                $voucher_data = array();

                $vouchers = $this->model_sale_order->getOrderVouchers($order_id);

                foreach ($vouchers as $voucher) {
                    $voucher_data[] = array(
                        'description' => $voucher['description'],
                        'amount'      => $this->currency->format($voucher['amount'], $order_info['currency_code'], $order_info['currency_value'])
                    );
                }

                $total_data = array();

                $totals = $this->model_sale_order->getOrderTotals($order_id);

                foreach ($totals as $total) {
                    $total_data[] = array(
                        'title' => $total['title'],
                        'text'  => $this->currency->format($total['value'], $order_info['currency_code'], $order_info['currency_value'])
                    );
                }

                $data['orders'][] = array(
                    'order_id'         => $order_id,
                    'invoice_no'       => $invoice_no,
                    'date_added'       => date($this->language->get('date_format_short'), strtotime($order_info['date_added'])),
                    'store_name'       => $order_info['store_name'],
                    'store_url'        => rtrim($order_info['store_url'], '/'),
                    'store_address'    => nl2br($store_address),
                    'store_email'      => $store_email,
                    'store_telephone'  => $store_telephone,
                    'email'            => $order_info['email'],
                    'telephone'        => $order_info['telephone'],
                    'shipping_address' => $shipping_address,
                    'shipping_method'  => $order_info['shipping_method'],
                    'product'          => $product_data,
                    'voucher'          => $voucher_data,
                    'total'            => $total_data,
                    'comment'          => nl2br($order_info['comment'])
                );
            }
        }

        $this->response->setOutput($this->load->view('sale/invoicePro', $data));
    }

    public function dateOwnOrder() {
        $json = array();

        if (isset($this->request->post['order']) && $this->request->post['order'] && isset($this->request->post['date_own'])) {
            $this->load->model('sale/OrderListPro');

           $this->model_sale_OrderListPro->dateOwnOrder($this->request->post['order'], $this->request->post['date_own']);
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function statusPayment() {
        $json = array();

        if (isset($this->request->get['order_id']) && isset($this->request->get['payment_status'])) {
            $this->load->model('sale/OrderListPro');
            $this->model_sale_OrderListPro->paymentStatus($this->request->get['order_id'], $this->request->get['payment_status']);
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function commentProductOrder() {
        $json = array();

        if (isset($this->request->post['product']) && $this->request->post['product'] && isset($this->request->post['comment'])) {
            $this->load->model('sale/OrderListPro');

           $this->model_sale_OrderListPro->addCommentProduct($this->request->post['product'], $this->request->post['comment']);
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function commentOrder() {
        $json = array();

        if (isset($this->request->post['order']) && $this->request->post['order'] && isset($this->request->post['comment'])) {
            $this->load->model('sale/OrderListPro');

           $this->model_sale_OrderListPro->addCommentOrder($this->request->post['order'], $this->request->post['comment']);
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function commentCustomer() {
        $json = array();

        if (isset($this->request->post['telephone']) && $this->request->post['telephone'] && isset($this->request->post['comment'])) {
            $this->load->model('sale/OrderListPro');

           $telephone = preg_replace('/[^0-9]/', '', $this->request->post['telephone']);

           if ($telephone) {
                $this->model_sale_OrderListPro->addCommentCustomer($telephone, $this->request->post['comment']);
           }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function sendSMS() {
        $json = array();

        if (isset($this->request->post['order_id']) && $this->request->post['order_id'] && isset($this->request->post['status_id']) && $this->request->post['status_id'] && isset($this->request->post['phone']) && $this->request->post['phone'] && isset($this->request->post['text']) && $this->request->post['text']) {

            $this->load->model('sale/OrderListPro');
            $OrderListPro_setting = $this->config->get('module_OrderListPro_setting');

            if (preg_match("/^[0-9]{12}$/", $this->request->post['phone'])) {
                $options = array(
                    'error'    => $this->config->get('config_error_filename'),
                    'report'   => $OrderListPro_setting['sms_log'],
                    'to'       => '+'.$this->request->post['phone'],
                    'from'     => $OrderListPro_setting['sms_from'],
                    'username' => $OrderListPro_setting['sms_username'],
                    'password' => $OrderListPro_setting['sms_password'],
                    'message'  => $this->request->post['text']
                );

                $sms = new Sms($OrderListPro_setting['sms_gateway'], $options);
                $sms->send();

                $this->model_sale_OrderListPro->sendSMS($this->request->post['order_id'], $this->request->post['status_id'], $this->request->post['text']);
            }
        }

        if (isset($this->request->post['sms']) && isset($this->request->post['message']) && $this->request->post['message']) {
            $this->load->model('sale/OrderListPro');
            $OrderListPro_setting = $this->config->get('module_OrderListPro_setting');
            foreach ($this->request->post['sms'] as $key => $info) {
                if (preg_match("/^[0-9]{12}$/", $info['phone'])) {
                    $options = array(
                        'error'    => $this->config->get('config_error_filename'),
                        'report'   => $OrderListPro_setting['sms_log'],
                        'to'       => '+'.$info['phone'],
                        'from'     => $OrderListPro_setting['sms_from'],
                        'username' => $OrderListPro_setting['sms_username'],
                        'password' => $OrderListPro_setting['sms_password'],
                        'message'  => $this->request->post['message']
                    );

                    $sms = new Sms($OrderListPro_setting['sms_gateway'], $options);
                    $sms->send();

                    $this->model_sale_OrderListPro->sendSMS($key, $info['status'], $this->request->post['message']);
                }
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }


    public function delete() {
        $this->load->language('sale/OrderListPro');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->session->data['success'] = $this->language->get('text_order_delete');

        $url = '';

        if (isset($this->request->get['filter_order_id'])) {
            $url .= '&filter_order_id=' . $this->request->get['filter_order_id'];
        }

        if (isset($this->request->get['filter_customer'])) {
            $url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_order_status'])) {
            $url .= '&filter_order_status=' . $this->request->get['filter_order_status'];
        }
    
        if (isset($this->request->get['filter_order_status_id'])) {
            $url .= '&filter_order_status_id=' . $this->request->get['filter_order_status_id'];
        }
            
        /*if (isset($this->request->get['filter_total'])) {
            $url .= '&filter_total=' . $this->request->get['filter_total'];
        }*/

        if (isset($this->request->get['filter_total_from'])) {
            $url .= '&filter_total_from=' . $this->request->get['filter_total_from'];
        }

        if (isset($this->request->get['filter_total_to'])) {
            $url .= '&filter_total_to=' . $this->request->get['filter_total_to'];
        }

        if (isset($this->request->get['filter_date_added'])) {
            $url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
        }

        if (isset($this->request->get['filter_date_modified'])) {
            $url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
        }

        if (isset($this->request->get['filter_comment'])) {
            $url .= '&filter_comment=' . urlencode(html_entity_decode($this->request->get['filter_comment'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_order_comment'])) {
            $url .= '&filter_order_comment=' . urlencode(html_entity_decode($this->request->get['filter_order_comment'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_customer_comment'])) {
            $url .= '&filter_customer_comment=' . urlencode(html_entity_decode($this->request->get['filter_customer_comment'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_product_comment'])) {
            $url .= '&filter_product_comment=' . urlencode(html_entity_decode($this->request->get['filter_product_comment'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_product_name'])) {
            $url .= '&filter_product_name=' . urlencode(html_entity_decode($this->request->get['filter_product_name'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_product_model'])) {
            $url .= '&filter_product_model=' . urlencode(html_entity_decode($this->request->get['filter_product_model'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_company'])) {
            $url .= '&filter_company=' . urlencode(html_entity_decode($this->request->get['filter_company'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_country'])) {
            $url .= '&filter_country=' . $this->request->get['filter_country'];
        }

        if (isset($this->request->get['filter_zone'])) {
            $url .= '&filter_zone=' . $this->request->get['filter_zone'];
        }

        if (isset($this->request->get['filter_city'])) {
            $url .= '&filter_city=' . urlencode(html_entity_decode($this->request->get['filter_city'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_address_1'])) {
            $url .= '&filter_address_1=' . urlencode(html_entity_decode($this->request->get['filter_address_1'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_address_2'])) {
            $url .= '&filter_address_2=' . urlencode(html_entity_decode($this->request->get['filter_address_2'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_postcode'])) {
            $url .= '&filter_postcode=' . urlencode(html_entity_decode($this->request->get['filter_postcode'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_date_own'])) {
            $url .= '&filter_date_own=' . $this->request->get['filter_date_own'];
        }

        if (isset($this->request->get['filter_status_payment'])) {
            $url .= '&filter_status_payment=' . $this->request->get['filter_status_payment'];
        }

        if (isset($this->request->get['filter_payments'])) {
            $url .= '&filter_payments=' . $this->request->get['filter_payments'];
        }

        if (isset($this->request->get['filter_customer_groups'])) {
            $url .= '&filter_customer_groups=' . $this->request->get['filter_customer_groups'];
        }

        if (isset($this->request->get['filter_telephone'])) {
            $url .= '&filter_telephone=' . urlencode(html_entity_decode($this->request->get['filter_telephone'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_email'])) {
            $url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_email'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_shippings'])) {
            $url .= '&filter_shippings=' . $this->request->get['filter_shippings'];
        }

        if (isset($this->request->get['sort'])) {
            $url .= '&sort=' . $this->request->get['sort'];
        }

        if (isset($this->request->get['order'])) {
             $url .= '&order=' . $this->request->get['order'];
        }

        if (isset($this->request->get['page'])) {
            $url .= '&page=' . $this->request->get['page'];
        }

        $this->response->redirect($this->url->link('sale/OrderListPro', 'user_token=' . $this->session->data['user_token'] . $url, true));
    }

    public function otherOrders() {

        $this->load->language('sale/OrderListPro');

        if (isset($this->request->get['page'])) {
            $page = (int)$this->request->get['page'];
        } else {
            $page = 1;
        }

        $data['all_orders'] = array();

        if (isset($this->request->get['order_id']) && isset($this->request->get['phone'])) {

            $order_id = preg_replace('/[^0-9]/', '', $this->request->get['order_id']);
            $phone = preg_replace('/[^0-9]/', '', $this->request->get['phone']);

            if ($order_id && $phone) {
            $this->load->model('sale/OrderListPro');

            $all_orders = $this->model_sale_OrderListPro->getOtherOrders($phone, $order_id, ($page - 1) * 5, 5);
                if ($all_orders) {
                    foreach ($all_orders as $all_order) {
                        $data['all_orders'][] = array(
                            'order_id'    => $all_order['order_id'],
                            'customer'    => $all_order['lastname'] . ' ' . $all_order['firstname'],
                            'total'       => $this->currency->format($all_order['total'], $all_order['currency_code'], $all_order['currency_value']),
                            'status'      => $all_order['name'],
                            'date_added'  => $all_order['date_added'],
                            'view'        => $this->url->link('sale/order/info', 'user_token=' . $this->session->data['user_token'] . '&order_id=' . $all_order['order_id'], true),
                        );
                    }
                }
                $orders_total = $this->model_sale_OrderListPro->getTotalOtherOrders($phone, $order_id);
                $pagination = new Pagination();
                $pagination->total = $orders_total;
                $pagination->page = $page;
                $pagination->limit = 5;
                $pagination->url = $this->url->link('sale/OrderListPro/otherOrders', 'user_token=' . $this->session->data['user_token'] . '&order_id=' . $order_id . '&phone=' . $phone . '&page={page}', true);

                $data['pagination'] = $pagination->render();

                $data['results'] = sprintf($this->language->get('text_pagination'), ($orders_total) ? (($page - 1) * 5) + 1 : 0, ((($page - 1) * 5) > ($orders_total - 5)) ? $orders_total : ((($page - 1) * 5) + 5), $orders_total, ceil($orders_total / 5));
            }
        }

        $this->response->setOutput($this->load->view('sale/order_other', $data));
    }

    protected function validate() {
        
        if (!$this->user->hasPermission('modify', 'sale/OrderListPro')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if ($this->error && !isset($this->error['warning'])) {
            $this->error['warning'] = $this->language->get('error_warning');
        }

        return !$this->error;
    }

    protected function validateKey() {

        $domain = strtoupper(base64_encode($_SERVER['SERVER_NAME']));

        $lock = str_replace(array('X', 'T', 'N', 'K', 'O', 'W', 'L', 'P', 'V', 'I', 'S', 'U', 'B', '='), array('M', 'A', 'R', 'F', 'H', 'C', 'D', 'Z', 'Y', 'E', 'J', 'Q', 'G', ''), $domain);

        $key = $this->config->get('module_OrderListPro_key');
        
        if ($lock !== $key) {
            return false;
        } else {
            return true;
        }
    }
}
