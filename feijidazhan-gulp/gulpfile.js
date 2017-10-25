var gulp = require('gulp');
var uglify = require('gulp-uglify'); //js压缩插件
var babel = require("gulp-babel");

gulp.task('jsTask2', function(){
	gulp.src('js/*.js')
	.pipe(babel({"presets": ["es2015"]}))
	.pipe(uglify()) //js压缩
	.pipe(gulp.dest('js_gulp'));
});


//默认任务
gulp.task("default", ["jsTask2"]);