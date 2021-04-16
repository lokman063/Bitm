   <form
                    class="row contact_form"
                    action="elements/customers/store.php"
                    method="post"
                    novalidate="novalidate"
                    >
                    <div class="col-md-6 form-group p_star">
                    <label>First Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="fist_name"
                            name="fist_name"
                        />

                    </div>
                    <div class="col-md-6 form-group p_star">
                    <label>Last Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="last_name"
                            name="last_name"
                        />
                        
                    </div>

                    <div class="col-md-6 form-group p_star">
                    <label> Mobile Number</label>
                        <input
                            type="text"
                            class="form-control"
                            id="mobile"
                            name="mobile"
                        />
                        
                    </div>
                    <div class="col-md-6 form-group p_star">
                    <label>Email Address</label>

                        <input
                        for="email"
                            type="text"
                            class="form-control"
                            id="email"
                            name="email"
                        />
                        <span
                            class="placeholder"
                            data-placeholder="Email Address"
                        ></span>
                    </div>


                        
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="btn submit_btn">
                            Sign Up
                            </button>
                        </div>

                        
                    <!-- <div class="col-md-12 form-group">
                        <div class="creat_account">
                            <h3>Shipping Details</h3>
                            <input type="checkbox" id="f-option3" name="selector" />
                            <label for="f-option3">Ship to a different address?</label>
                        </div>
                        <textarea
                            class="form-control"
                            name="message"
                            id="message"
                            rows="1"
                            placeholder="Order Notes"
                        ></textarea>
                    </div> -->
                    </form>