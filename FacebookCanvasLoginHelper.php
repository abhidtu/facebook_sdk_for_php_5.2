<?php
/**
 * Copyright 2014 Facebook, Inc.
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * Facebook.
 *
 * As with any software that integrates with the Facebook platform, your use
 * of this software is subject to the Facebook Developer Principles and
 * Policies [http://developers.facebook.com/policy/]. This copyright notice
 * shall be included in all copies or substantial portions of the software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 */


/**
 * Class FacebookCanvasLoginHelper
 * @package Facebook
 * @author Fosco Marotto <fjm@fb.com>
 * @author David Poll <depoll@fb.com>
 */
class Facebook_FacebookCanvasLoginHelper extends Facebook_FacebookSignedRequestFromInputHelper
{

  /**
   * Returns the app data value.
   *
   * @return mixed|null
   */
  public function getAppData()
  {
    return $this->signedRequest ? $this->signedRequest->get('app_data') : null;
  }

  /**
   * Get raw signed request from either GET or POST.
   *
   * @return string|null
   */
  public function getRawSignedRequest()
  {
    /**
     * v2.0 apps use GET for Canvas signed requests.
     */
    $rawSignedRequest = $this->getRawSignedRequestFromGet();
    if ($rawSignedRequest) {
      return $rawSignedRequest;
    }

    /**
     * v1.0 apps use POST for Canvas signed requests, will eventually be
     * deprecated.
     */
    $rawSignedRequest = $this->getRawSignedRequestFromPost();
    if ($rawSignedRequest) {
      return $rawSignedRequest;
    }

    return null;
  }

}
