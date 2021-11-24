<?php

/**
 * Copyright (c) 2018-2021 Comet Licensing Ltd.
 * Please see the LICENSE file for usage information.
 * 
 * SPDX-License-Identifier: MIT
 */

namespace Comet;

interface NetworkRequest {

	public function Parameters();

	public function Endpoint();

	public function Method();

	public function ContentType();

}
