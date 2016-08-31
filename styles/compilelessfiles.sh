#!/bin/bash
~/apps/node/node-v0.12.7-linux-x86/bin/lessc --source-map=executivewelcome.map ./less/executivewelcomecustom.less executivewelcome.css 
~/apps/node/node-v0.12.7-linux-x86/bin/lessc --source-map=executivewelcome.min.map --compress ./less/executivewelcomecustom.less executivewelcome.min.css 