#!/bin/bash
lessc --source-map=executivewelcome.map ./less/executivewelcomecustom.less executivewelcome.css 
lessc --source-map=executivewelcome.map --compress ./less/executivewelcomecustom.less executivewelcome.min.css 