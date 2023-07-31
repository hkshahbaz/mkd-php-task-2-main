<?php


class Model_builder
{
  private $_config;

  public function __construct ()
  {

    $this->_config = json_decode(file_get_contents('configuration.json'), TRUE);

  }

  public function build ()
  {
    $count = 1;
    $base_url =Flight::get('base_url');
    $input_prefix = array();

    foreach($this->_config as $model){

      $html = '<div class="container mb-5">
                  <div class="row">
                    <div class="col-8">';
                  
      $html .=  '<?php if(isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        Required fields are missign!
                    </div>       
                  <?php endif; ?>';

      $html .=  '<a href="'.$base_url.'" class="btn btn-dark w-50 mt-2 mb-2">See All Models</a>';
     
                    $action_url = $base_url.'model/store/'.$count;

      $html .=  '<form class="mt-5" method="POST" action="'.$action_url.'">';

                    foreach ($model as $m_data) {
                      $html .=     '<h4>'.ucwords($m_data['name']).':</h4>';
                      $input_prefix[] = strtolower($m_data['name']);

                      foreach ($m_data['field'] as $input) {

                          $name = strtolower($input[0]);
                          $input_name = strtolower($m_data['name']).'_'.$name;

                          if($input[1] == "integer"){
                            $type = "number";
                          }
                          elseif($input[1] == "string"){
                            $type = "text";
                          }
                          elseif($input[1] == "email"){
                            $type = "email";
                          }
                          
                          $label = ucwords($input[2]);

                          $validation = "";
                          if($input[3] == "required"){
                            $validation = "required='required'";
                          }

                          if($name == "status"){

                            $html .=  '<div class="form-group">
                                            <select class="form-control" id="exampleFormControlSelect1" name="'.$input_name.'">
                                              <option selected>Select Status</option>
                                              <option value="true">True</option>
                                              <option value="false">False</option>
                                            </select>
                                          </div>';
                          }
                          else{
                            $html .=  '<div class="form-group">
                                        <label for="loc_name">'.$label.'</label>
                                        <input type="'.$type.'" class="form-control" id="loc_name" placeholder="'.$label.'" name="'.$input_name.'" '.$validation.'>
                                    </div>';
                          }
                      }
                    }
          
      // storing input prefix for dynamic validtion
      $input_prefix_val = implode(',',$input_prefix);
      $html .=  '<input type="hidden" name="input_prefix" value="'.$input_prefix_val.'">';

      $html .=  '<button type="submit" class="btn btn-info mt-4">Submit</button>
                    </form>
                    </div>
                  </div>
                </div>';

      //generate files and put it into release folder
      //Copy initialize files into release folder
      $myFile = "model_".$count.".php"; // or .php   
      $fh = fopen('release/'.$myFile, 'w'); // or die("error");    
      fwrite($fh, $html);
      fclose($fh);

      $myFile = "model_".$count.".php"; // or .php   
      $fh = fopen('views/'.$myFile, 'w'); // or die("error");    
      fwrite($fh, $html);
      fclose($fh);

      $count++;
    }

   return $this->_config;
  }
}