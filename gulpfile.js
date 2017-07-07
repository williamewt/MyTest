var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('styles', function() {
    gulp.src('sass/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./css/'));
});


gulp.task('default', function() {
  gulp.watch('sass/style.scss',['styles']);

//   gulp.src('./config.exemple.php')
//         .pipe(gulp.dest('./', ['config.php']));
});