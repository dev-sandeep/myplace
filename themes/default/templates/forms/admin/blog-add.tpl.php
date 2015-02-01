<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<section id="blog-add-wrapper" class="m_top_20">
    <form method="post">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading t_align_c">
                    <h2 class="color_white">Add new blog</h2>
                </div>
                <div class="panel-body bg_white">
                    <div class=" form-group">
                        <div class="col-lg-1">
                            <label>Title:</label>
                        </div>
                        <div class="col-sm-11">
                            <input class="form-control" type="text" name="title" placeholder="Title of your blog">
                        </div>
                    </div>
                    
                    <br><br>
                    <div class=" form-group">
                        <div class="col-lg-1">
                            <label>Category:</label>
                        </div>
                        <div class="col-sm-11">
                            <select class="form-control" name="category">
                                <?php foreach ($categories as $key => $val): ?>
                                    <option value="<?= $key ?>"><?= $val ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <div class=" form-group">
                        <div class="col-lg-1">
                            <label>Tags:</label>
                        </div>
                        <div class="col-sm-11">
                            <input class="form-control" type="text" name="tags" placeholder="Give some tags for your blog(seperated by commas)">
                        </div>
                    </div>
                    <br><br>
                    <div class=" form-group">
                        <div class="col-lg-1">
                            <label>Image:</label>
                        </div>
                        <div class="col-sm-11">
                            <textarea rows="10" name="image" class="form-control" placeholder="image of your blog"></textarea>
                        </div>
                    </div>
                    <br><br>
                    <div class=" form-group">
                        <div class="col-lg-1">
                            <label>Body:</label>
                        </div>
                        <div class="col-sm-11">
                            <textarea rows="20" name="body" class="form-control" placeholder="Body of your blog"></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel-footer panel-danger">
                    <button type="submit" name="submit" value="blog-add" class="btn btn-danger form-control">submit</button>
                </div>
            </div>
        </div>
    </form>
</section>