<?php
/*
 * Copyright (c) 2010 by Justin Otherguy <justin@justinotherguy.org>
 *
 * This program is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License (either version 2 or
 * version 3) as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.
 *
 * For more information on the GPL, please go to:
 * http://www.gnu.org/copyleft/gpl.html
 */

namespace Volkszaehler\View\Xml;

class Group extends Xml {
	protected $xml;
	
	public function __construct(\Volkszaehler\View\Http\Request $request, \Volkszaehler\View\Http\Response $response) {
		parent::__construct($request, $response);
			
		$this->xml = $this->xmlDoc->createElement('groups');
	}
	
	public function add(\Volkszaehler\Model\Group $obj) {
		$xmlGroup = $this->xmlDoc->createElement('group');
		$xmlGroup->setAttribute('uuid', $obj->getUuid());
		$xmlGroup->appendChild($this->xmlDoc->createElement('name', $obj->getName()));
		$xmlGroup->appendChild($this->xmlDoc->createElement('description', $obj->getDescription()));
			
		// TODO include sub groups?
			
		$this->xml->appendChild($xmlGroup);
	}
	
	public function render() {
		$this->xmlRoot->appendChild($this->xml);
		
		parent::render();
	}
}