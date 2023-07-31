
    <div class="container">
      <div class="row">
            <?php $count=1; ?>
            <?php  foreach($models as $model): ?>
            <div class="col-4">
              <div class="card" style="width: 18rem;">
             
                <div class="card-body">
                  <h5 class="card-title">Model <?= $count ?></h5>
                  <?php $base_url =Flight::get('base_url'); ?>
                  <a href="<?= $base_url.'model/'.$count; ?> " class="btn btn-info w-100">View Model</a>
                </div>
              </div>
            </div>
            <?php
            $count++;
            endforeach;

            ?>
      </div>
    </div>  
    
