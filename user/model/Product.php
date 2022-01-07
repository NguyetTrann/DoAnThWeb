<?php
include_once '../util/mySQLUtil.php';

    class Product{
        private $masp;
        private $tensp;
        private $hinh;
        private $gia;

        public function __construct($masp, $tensp, $gia, $hinh) {
            $this->ma = $ma;
            $this->tensp = $tensp;
            $this->gia = $gia;
            $this->hinh = $hinh;
        }

        public function get_masp() { return $this->masp; }

        public function set_masp($masp) { $this->masp = $masp; }

        public function get_tensp() { return $this->tensp; }

        public function set_tensp($tensp) { $this->tensp = $tensp; }

        public function get_gia() { return $this->gia; }

        public function set_gia($gia) { $this->gia = $gia; }

        public function get_hinh() { return $this->hinh; }

        public function set_hinh($hinh) { $this->hinh = $hinh;}

    }