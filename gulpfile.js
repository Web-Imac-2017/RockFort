var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('styles', function() {
    gulp.src('./src/css/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./dist/css'));
});

gulp.task('default',function() {
    gulp.watch('./src/css/*.scss',['styles']);
});

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
