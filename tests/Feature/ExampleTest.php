<?php

test('the homepage redirects to products page', function () {
    $response = $this->get('/');

    $response->assertRedirect(route('products.index'));
});
