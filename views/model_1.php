<div class="container mb-5">
                  <div class="row">
                    <div class="col-8"><?php if(isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        Required fields are missign!
                    </div>       
                  <?php endif; ?><a href="http://localhost/mkd-php-task-2/initialize/" class="btn btn-dark w-50 mt-2 mb-2">See All Models</a><form class="mt-5" method="POST" action="http://localhost/mkd-php-task-2/initialize/model/store/1"><h4>Location:</h4><div class="form-group">
                                        <label for="loc_name">ID</label>
                                        <input type="number" class="form-control" id="loc_name" placeholder="ID" name="location_id" required='required'>
                                    </div><div class="form-group">
                                        <label for="loc_name">Name</label>
                                        <input type="text" class="form-control" id="loc_name" placeholder="Name" name="location_name" required='required'>
                                    </div><div class="form-group">
                                            <select class="form-control" id="exampleFormControlSelect1" name="location_status">
                                              <option selected>Select Status</option>
                                              <option value="true">True</option>
                                              <option value="false">False</option>
                                            </select>
                                          </div><h4>Email:</h4><div class="form-group">
                                        <label for="loc_name">ID</label>
                                        <input type="number" class="form-control" id="loc_name" placeholder="ID" name="email_id" required='required'>
                                    </div><div class="form-group">
                                        <label for="loc_name">Email</label>
                                        <input type="text" class="form-control" id="loc_name" placeholder="Email" name="email_email" required='required'>
                                    </div><div class="form-group">
                                            <select class="form-control" id="exampleFormControlSelect1" name="email_status">
                                              <option selected>Select Status</option>
                                              <option value="true">True</option>
                                              <option value="false">False</option>
                                            </select>
                                          </div><h4>Sms:</h4><div class="form-group">
                                        <label for="loc_name">ID</label>
                                        <input type="number" class="form-control" id="loc_name" placeholder="ID" name="sms_id" required='required'>
                                    </div><div class="form-group">
                                        <label for="loc_name">Phone</label>
                                        <input type="text" class="form-control" id="loc_name" placeholder="Phone" name="sms_phone" required='required'>
                                    </div><div class="form-group">
                                            <select class="form-control" id="exampleFormControlSelect1" name="sms_status">
                                              <option selected>Select Status</option>
                                              <option value="true">True</option>
                                              <option value="false">False</option>
                                            </select>
                                          </div><h4>User:</h4><div class="form-group">
                                        <label for="loc_name">ID</label>
                                        <input type="number" class="form-control" id="loc_name" placeholder="ID" name="user_id" required='required'>
                                    </div><div class="form-group">
                                        <label for="loc_name">Name</label>
                                        <input type="text" class="form-control" id="loc_name" placeholder="Name" name="user_name" required='required'>
                                    </div><div class="form-group">
                                        <label for="loc_name">Email</label>
                                        <input type="text" class="form-control" id="loc_name" placeholder="Email" name="user_email" required='required'>
                                    </div><div class="form-group">
                                            <select class="form-control" id="exampleFormControlSelect1" name="user_status">
                                              <option selected>Select Status</option>
                                              <option value="true">True</option>
                                              <option value="false">False</option>
                                            </select>
                                          </div><input type="hidden" name="input_prefix" value="location,email,sms,user"><button type="submit" class="btn btn-info mt-4">Submit</button>
                    </form>
                    </div>
                  </div>
                </div>