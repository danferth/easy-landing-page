var Promise         = require('es6-promise').Promise,
    gulp            = require('gulp'),
    colors          = require('colors'),
    filesize        = require('gulp-filesize'),
    del             = require('del'),
    argv            = require('yargs').argv,
    gulpif          = require('gulp-if'),
    sourcemaps      = require('gulp-sourcemaps'),
    postcss         = require('gulp-postcss'),
    sass            = require('gulp-sass'),
    sasslint        = require('gulp-sass-lint'),
    autoprefixer    = require('gulp-autoprefixer'),
    cleanCSS        = require('gulp-clean-css'),
    concat          = require('gulp-concat'),
    uglify          = require('gulp-uglify'),
    jshint          = require('gulp-jshint'),
    imagemin        = require('gulp-imagemin'),
    pngquant        = require('imagemin-pngquant'),
    mkdirp          = require('mkdirp'),
    createFile      = require('create-file');
//=======options==============================================================================
var src         = "assets",
    dest        = "assets",
    //css locations
    css_file    = "style",
    css_src     = src + "/scss",
    css_dest    = dest + "/css",
    //js locations
    js_file     = "site",
    js_src      = src + "/js",
    js_dest     = dest + "/",
    //image locations
    image_src   = src + "/images",
    image_dest  = dest + "/images";

//=======Start================================================================================
gulp.task('create-build-dir', function(){
  mkdirp('assets/build/js', function(err){
    (err) ? console.log(err) : console.log("js folder created".green);
  });
  mkdirp('assets/build/css', function(err){
    (err) ? console.log(err) : console.log("css folder created".green);
  });
  mkdirp('assets/build/img', function(err){
    (err) ? console.log(err) : console.log("img folder created".green);
  });
});

gulp.task('create-dev-dir', function(){
  createFile(js_src + '/' + js_file + '.js', '//site js here. Lib js files concatenated above this file', function(err){
    (err) ? console.log(err) : console.log("js file created".yellow);
  });
  createFile(css_src + '/' + css_file + '.scss', '//start styling!', function(err){
    (err) ? console.log(err) : console.log("scss file created".yellow);
  });
  mkdirp(image_src, function(err){
    (err) ? console.log(err) : console.log('src img directory created'.yellow);
  });
});

//=======build file structure=================================================================
gulp.task('start', ['create-build-dir','create-dev-dir']);

//=======Create index.html====================================================================
gulp.task('create-index', function(){
  createFile('index.html',html_content, function(err){
    (err) ? console.log(err) : console.log("index.html has been created".yellow);
  });
});

//=======default task=========================================================================
gulp.task('default',['watch']);

//=======help=================================================================================
gulp.task('help', function(){
  console.log("=============================================================".bold.green);
  console.log("start              = create 'build' & 'dev' directories".white);
  console.log("create-index       = creates index.html file with css and js links");
  console.log("clean              = delete contents of build folder".red);
  console.log("copy --src folder  = copy folder from dev to build (for fonts json..");
  console.log("css                = sourcemaps | sass | prefix | minimize | filesize".cyan);
  console.log("js                 = concat | jshint | filesize".yellow);
  console.log("js --production    = concat | sourcemaps | minimize | filesize".yellow);
  console.log("image              = optimize images and save to build dir".magenta);
  console.log("watch (default)    = css && js".bold.green);
  console.log("build              = css, js --production & image".grey);
  console.log("build --production = css, js --production & image".inverse);
  console.log("=============================================================".bold.yellow);
});

//=======clean================================================================================
gulp.task('clean', function(){
   return del([
      dest + '/**/*'
    ]);
});

//=======stylesheet===========================================================================
//sourcemaps | sass | prefix | minimize | filesize
gulp.task('css', function(){
  return gulp.src('assets/css/style.scss')
  .pipe(sourcemaps.init())
  .pipe(sass())
  .pipe(autoprefixer({browsers: "last 2 versions"}))
  .pipe(cleanCSS({ compatibility: 'ie9' }))
  .pipe(sourcemaps.write())
  .pipe(gulp.dest('assets/'))
  .pipe(filesize());
});

//=======javascript===========================================================================
//concat | jshint | filesize
//(--production) concat | sourcemaps | minimize | filesize
gulp.task('js', function(){
  return gulp.src(['assets/js/*.js'])
  .pipe(concat('site.js'))
  .pipe(jshint())
  .pipe(jshint.reporter('jshint-stylish'))
  .pipe(sourcemaps.init())
  .pipe(uglify())
  .pipe(sourcemaps.write())
  .pipe(gulp.dest('assets/'))
  .pipe(filesize());
});

//=======images===============================================================================
gulp.task('image', function(){
  return gulp.src('assets/images/**')
  .pipe(imagemin({
      progressive: true,
      svgPlugins: [{removeViewBox: false}],
      use: [pngquant()]
  }))
  .pipe(gulp.dest('assets/img/'));
});

//=======copy files===========================================================================
gulp.task('copy', function(){
  return gulp.src(src + "/" + argv.src + "/**")
  .pipe(gulp.dest(dest + "/" + argv.src))
});
//=======watch================================================================================
gulp.task('watch',function(){
  gulp.watch('assets/css/**', ['css']);
  gulp.watch(['assets/js/**'],['js']);
});

//=======BUILD================================================================================
//pass argument --production i.e. $ gulp build --production
gulp.task('build',['css', 'js', 'image']);

var html_content = "<!doctype html>\n<html lang='en'>\n<head>\n\t<meta charset='UTF-8'>\n\t<meta name='viewport' content='width=device-width, initial-scale=1'>\n\t<title></title>\n\t<link rel='stylesheet' href='" + css_dest + "/" + css_file + ".css' type='text/css' />\n</head>\n<body>\n\n\n\t<script type='text/javascript' src='" + js_dest + "/" + js_file + ".js'></script> \n</body>\n</html>\n";