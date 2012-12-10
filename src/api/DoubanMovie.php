<?php
/**
 * @file DoubanMovie.php
 * @brief 豆瓣电影API接口
 * @author JonChou <ilorn.mc@gmail.com>
 * @date 2012-12-05
 */

class DoubanMovie extends DoubanBase {

    /**
     * @brief 构造函数，初始设置clientId
     *
     * @param string $clientId
     *
     * @return void
     */
    public function __construct($clientId)
    {
        $this->clientId = $clientId;
    }
    
    /**
     * @brief 获取电影信息
     *
     * @param string $id
     *
     * @return object
     */
    public function info($requestType, $params)
    {
        $this->type = $requestType;
        $this->uri = '/v2/movie/'.$params['id'];
        return $this;
    }
    
    /**
     * @brief 根据imdb号获取电影信息
     *
     * @param string $name
     *
     * @return object
     */
    public function imdb($requestType, $params)
    {
        $this->type = $requestType;
        $this->uri = '/v2/movie/imdb/'.$params['name'];
        return $this;
    }

    public function search($requestType, $params)
    {
        $this->type = $requestType;
        $this->uri = '/v2/movie/search?'.http_build_query($params);
        return $this;
    }

    public function movieTags($requestType, $params)
    {
        $this->type = $requestType;
        $this->uri = '/v2/movie/'.$params['id'].'/tags';
        return $this;
    }

    public function userTags($requestType, $params)
    {
        $this->type = $requestType;
        $this->uri = '/v2/movie/user_tags/'.$params['id'];
        return $this;
    }
    
    /**
     * @brief 电影评论相干操作
     *
     * @param $requestType
     * @param $params
     *
     * @return object
     */
    public function review($requestType, $params)
    {
        $this->type = $requestType;
        switch ($this->type) {
            case 'POST':
                $this->uri = '/v2/movie/reviews';
                break;
            case 'PUT':
            case 'DELETE':
                $this->uri = '/v2/movie/review/'.$params['id'];
                break;
        }
        return $this;
    }
}
