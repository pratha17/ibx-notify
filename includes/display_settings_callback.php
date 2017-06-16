
<div>
            <?php screen_icon(); ?>
            <h1>MailChimp Settings</h1>
    <form id="" enctype="multipart/form-data" method="post" name="" action="">
    <!-- Display Setting -->
            <div class="display_setting dis_sec">
                    <p>These are some MailChimp settings.</p>
                        <table class="form-table">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <label for="Enable MailChimp"><?php _e( 'Enable MailChimp', 'ib_monk_network_demo' ); ?></label>
                                    </th>
                                    <td>
                                        <fieldset>
                                            <input type="hidden" name="ib_mailchimp" value="0">
                                            <label><input type="checkbox" id="ib_mailchimp" name="ib_mailchimp" value="1">
                                                <?php _e( 'If checked, this will auto enable MailChimp. Disable this if you do not want to use MailChimp. ', 'ib_monk_network_demo' ); ?></label>
                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="MailChimp User Name"><?php _e( 'MailChimp User Name', 'ib_monk_network_demo' ); ?></label>
                                    </th>
                                    <td>
                                        <fieldset>
                                            <input type="text" id="ib_mailchimp_username" name="ib_mailchimp_username" value="" placeholder="User Name"/>

                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="MailChimp API Key"><?php _e( 'MailChimp API Key', 'ib_monk_network_demo' ); ?></label>
                                    </th>
                                    <td>
                                        <fieldset>
                                            <input type="text" id="ib_mailchimp_api_key" name="ib_mailchimp_api_key" value="" placeholder="API Key"/ style="width:50%;">
                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="MailChimp List ID"><?php _e( 'MailChimp List ID', 'ib_monk_network_demo' ); ?></label>
                                    </th>
                                    <td>
                                            <?php
                                            $api_key = '641e1181662940299d245ab55fb0d9a2-us15';
                                            $data = array( 'fields' => 'lists', 'count' => 20 );
                                            // Query String Perameters are here
                                            // for more reference please vizit http://developer.mailchimp.com/documentation/mailchimp/refeence/lists/

                                            $url = 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/';
                                            $result = json_decode( rudr_mailchimp_curl_connect( $url, 'GET', $api_key, $data) );
                                            //print_r( $result);

                                            if( !empty($result->lists) ) {
                                            	echo '<select>';
                                            	foreach( $result->lists as $list ){
                                            		echo '<option value="' . $list->id . '">' . $list->name . ' (' . $list->stats->member_count . ')</option>';
                                            		// you can also use $list->date_created, $list->stats->unsubscribe_count, $list->stats->cleaned_count or vizit MailChimp API Reference for more parameters (link is above)
                                            	}
                                            	echo '</select>';
                                            } elseif ( is_int( $result->status ) ) { // full error glossary is here http://developer.mailchimp.com/documentation/mailchimp/guides/error-glossary/
                                            	echo '<strong>' . $result->title . ':</strong> ' . $result->detail;
                                            }
                                        ?>
                                             <input type="button" class="button-primary" value="Reload List" onClick="window.location.reload()">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
            </div>
            <p class="submit no-border">
                <input class="button-primary" name="submit" value="<?php _e( 'Save', 'ib-monk-network-demo' ) ?>" type="submit"/><br /><br />
            </p>

        </form>
</div>
<?php
function rudr_mailchimp_curl_connect( $url, $request_type, $api_key, $data = array() ) {
	if( $request_type == 'GET' )
		$url .= '?' . http_build_query($data);

	$mch = curl_init();
	$headers = array(
		'Content-Type: application/json',
		'Authorization: Basic '.base64_encode( 'user:'. $api_key )
	);
	curl_setopt($mch, CURLOPT_URL, $url );
	curl_setopt($mch, CURLOPT_HTTPHEADER, $headers);
	//curl_setopt($mch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	curl_setopt($mch, CURLOPT_RETURNTRANSFER, true); // do not echo the result, write it into variable
	curl_setopt($mch, CURLOPT_CUSTOMREQUEST, $request_type); // according to MailChimp API: POST/GET/PATCH/PUT/DELETE
	curl_setopt($mch, CURLOPT_TIMEOUT, 10);
	curl_setopt($mch, CURLOPT_SSL_VERIFYPEER, false); // certificate verification for TLS/SSL connection

	if( $request_type != 'GET' ) {
		curl_setopt($mch, CURLOPT_POST, true);
		curl_setopt($mch, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
	}

	return curl_exec($mch);
}
 ?>
