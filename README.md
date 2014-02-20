DrewRawitz.com [![Build Status](https://travis-ci.org/drewrawitz/DrewRawitz.com.png?branch=master)](https://travis-ci.org/drewrawitz/DrewRawitz.com) [![Built with Grunt](https://cdn.gruntjs.com/builtwith.png)](http://gruntjs.com/)

==============

The personal website of Drew Rawitz.

* Source: [github.com/drewrawitz/DrewRawitz.com](https://github.com/drewrawitz/DrewRawitz.com)
* Homepage: [drewrawitz.com](http://www.drewrawitz.com)
* Twitter: [@drewrawitz](http://twitter.com/drewrawitz)

## Cron Jobs
I have one cron job running every hour which executes my instagram feed API and saves the full-size and the thumbnail version of any new images.

`wget -O - http://www.drewrawitz.com/scripts/instagram/feed.php`

## Roadmap
* Responsive!
* Add Cache Busting to my CSS/JS files - Grunt Task
* Get a blog set up using Jekyll

## License

#### The MIT License (MIT)

Copyright (c) 2013 Drew Rawitz

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
