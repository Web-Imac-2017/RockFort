var gulp = require('gulp');
var sass = require('gulp-sass');

<<<<<<< HEAD
gulp.task('styles', function() {
    gulp.src('./src/css/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./dist/css'));
});

gulp.task('default',function() {
    gulp.watch('./src/css/*.scss',['styles']);
});
=======
var input = 'app/front/scss/**/*.scss';
var output = 'app/front/css';

var sassOptions = {
  errLogToConsole: true,
  outputStyle: 'expanded'
};


gulp.task('sass', function () {
  return gulp
    	.src(input)
    	.pipe(sass(sassOptions).on('error', sass.logError))
    	.pipe(gulp.dest(output));
});


gulp.task('watch',function() {
    gulp.watch(input,['sass']);
});
>>>>>>> 8f62be4ff9ebcab734b65045647138d21f00d23b
