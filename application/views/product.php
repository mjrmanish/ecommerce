<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Tocly - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <base href="<?php echo base_url(); ?>">
    <!-- App favicon -->
    <?php $this->load->view('links'); ?>

</head>

<?php $this->load->view('header'); ?>
<!-- Left Sidebar End -->



<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <?php if($this->session->flashdata('successMsg')){
                ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('successMsg'); ?>
                </div>
                <?php
            } ?>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0 align-items-center d-flex pb-0">
                            <h4 class="card-title mb-0 flex-grow-1">Product</h4>
                            <div class="text-center mt-4">
                                <a href="javascript: void(0);"
                                    class="btn btn-primary waves-effect waves-light btn-sm">View More <i
                                        class="mdi mdi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                            <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h5 class="card-title">Floating labels</h5>
                                        <p class="card-title-desc">Create beautifully simple form labels that float over your input fields.</p> -->
                                        <?php echo form_open_multipart(); ?>                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" name="pro_id"  id="id" placeholder="Product Name">
                                                        <label for="id">Product ID</label>
                                                        <?php echo form_error('pro_id', '<div class="text-danger">*', '</div>') ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" onchange="get_categories(this.value)" name="category" id="floatingSelectGrid">
                                                            <option selected disabled>Select Category</option>
                                                            <?php foreach($categories as $val): ?>
                                                                <option value="<?php echo $val->cate_id; ?>"><?php echo $val->cate_name; ?></option>
                                                                <?php endforeach; ?>
                                                        </select>
                                                        <label for="floatingSelectGrid">Category</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select subcat" name="sub_category" id="floatingSelectGrid">
                                                            <option selected disabled>Select Sub Category</option>
                                                        </select>
                                                        <label for="floatingSelectGrid">Sub Category</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="pro_name"  id="na" placeholder="Product Name">
                                                        <label for="na">Product Name</label>
                                                        <?php echo form_error('pro_name', '<div class="text-danger">*', '</div>') ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="brand"  id="brand1" placeholder="Product Brand">
                                                        <label for="brand1">Product Brand</label>
                                                        <?php echo form_error('brand', '<div class="text-danger">*', '</div>') ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" name="featured" id="floatingSelectGrid" >
                                                            <option selected disabled>Select featured</option>
                                                            <option value="1">Deal of the Month</option>
                                                            <option value="0">New arrival</option>
                                                        </select>
                                                        <label for="floatingSelectGrid">Featured</label>
                                                        <?php echo form_error('featured', '<div class="text-danger">*', '</div>') ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" name="highlights" id="floatingSelectGrid" ></textarea>
                                                        <label for="floatingSelectGrid">Highlights</label>
                                                        <?php echo form_error('highlights', '<div class="text-danger">*', '</div>') ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" name="description" id="floatingSelectGrid" ></textarea>
                                                        <label for="floatingSelectGrid">Description</label>
                                                        <?php echo form_error('description', '<div class="text-danger">*', '</div>') ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" name="stock"  id="id" placeholder="Product Name">
                                                        <label for="id">Product Stock</label>
                                                        <?php echo form_error('stock', '<div class="text-danger">*', '</div>') ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" name="mrp"  id="id" placeholder="Product Name">
                                                        <label for="id">Product MRP</label>
                                                        <?php echo form_error('mrp', '<div class="text-danger">*', '</div>') ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" name="selling_price"  id="id" placeholder="Product Name">
                                                        <label for="id">Product Selling Price</label>
                                                        <?php echo form_error('selling_price', '<div class="text-danger">*', '</div>') ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" name="meta_title" id="floatingSelectGrid" ></textarea>
                                                        <label for="floatingSelectGrid">Meta Title</label>
                                                        <?php echo form_error('meta_title', '<div class="text-danger">*', '</div>') ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" name="meta_keywords" id="floatingSelectGrid" ></textarea>
                                                        <label for="floatingSelectGrid">Meta Keywords</label>
                                                        <?php echo form_error('meta_keywords', '<div class="text-danger">*', '</div>') ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" name="meta_desc" id="floatingSelectGrid" ></textarea>
                                                        <label for="floatingSelectGrid">Meta Description </label>
                                                        <?php echo form_error('meta_desc', '<div class="text-danger">*', '</div>') ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="file" class="form-control" name="pro_main_image"  id="pin" placeholder="Main Image">
                                                        <label for="pin">Product Main Image</label>
                                                        <?php echo form_error('pro_main_image', '<div class="text-danger">*', '</div>') ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="file" class="form-control" name="gallery_image"  id="pin" placeholder="Gallery Image">
                                                        <label for="pin">Product Gallery Image</label>
                                                        <?php echo form_error('gallery_image', '<div class="text-danger">*', '</div>') ?>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="brand"  id="brand1" placeholder="Product Brand">
                                                        <label for="brand1">Product Brand</label>
                                                        <?php echo form_error('brand', '<div class="text-danger">*', '</div>') ?>
                                                    </div>
                                                </div>
                                                <!-- <?php form_error('cate_name', '<div class="text-danger">*', '</div>') ?> -->
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" name="status" id="floatingSelectGrid" >
                                                            <option selected disabled>Select Status</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Deactive</option>
                                                        </select>
                                                        <label for="floatingSelectGrid">Status</label>
                                                        <?php echo form_error('status', '<div class="text-danger">*', '</div>') ?>
                                                    </div>
                                                </div>
                                                 
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                                            </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php $this->load->view('footer'); ?>