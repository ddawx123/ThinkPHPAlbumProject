<?php
namespace Home\Controller;

use Think\Controller;

class APIController extends Controller
{
	/**
	 * Permission verify
	 * @return string
	 */
    public function checkPerm()
    {
        if (!isset($_SESSION['myalbum_token'])) {
            $arr = array(
                'code' => 403,
                'message' => '您没有相应权限访问该接口，请传入有效的token或登录有效帐号后再次尝试。',
                'requestId' => date('YmdHis', time()),
            );
            self::api($arr);
        }
	}
	
	/**
	 * Api response logic
	 * @param array $data Data Object
	 * @return string
	 */
    public function api($data = null)
    {
        if ($data == null) {
            $arr = array(
                'code' => 500,
                'message' => '接口输出失败，数据返回处于null状态。',
                'requestId' => date('YmdHis', time()),
            );
            $this->ajaxReturn($arr, 'xml');
        } else if (I('callback', '', 'htmlspecialchars') != '') {
            $this->ajaxReturn($data, 'jsonp');
        } else {
            $this->ajaxReturn($data, 'xml');
        }
    }
}
