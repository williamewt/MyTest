var gulp = require('gulp');
var sass = require('gulp-sass');
var rename = require('gulp-rename');

gulp.task('style', function() {
    gulp.src('sass/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./css/'));
});

gulp.task('config', function(){
  gulp.src("./config.exemple.php")
  .pipe(rename("./config.php"))
  .pipe(gulp.dest("./"));
});


gulp.task('default', function() {
  gulp.watch('sass/style.scss',['style']);

});