<?php

namespace MR\SDK\Endpoints;

class CategoryEndpoint extends Endpoint
{
    const TYPE_INTEREST = 'interest';
    const TYPE_SERVICE = 'service';
    const TYPE_GOOD = 'good';
    const TYPE_BADGE = 'badge';
    const TYPE_ASSOCIATION = 'association';

    /**
     * @param string $type
     * @param int    $page
     * @param int    $perPage
     *
     * @return \MR\SDK\Transport\Response
     */
    public function all($type = null, $page = 1, $perPage = 20)
    {
        return $this->request->get('/categories', [
            'type' => $type,
            'page' => $page,
            'perPage' => $perPage,
        ]);
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get('/categories/'.$id);
    }
}
