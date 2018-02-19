const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass');

//Compile Sass into css and auto inject into browsers
gulp.task('sass', function () {
    gulp.src('src/scss/style.scss')
        .pipe(sass())
        .pipe(gulp.dest('src'))
        .pipe(browserSync.stream());
});

gulp.task('serve', ['sass'], function () {

    browserSync.init({
        proxy: "localhost/stevensteinwand"
    });

    gulp.watch('src/scss/*.scss', ['sass']);
    gulp.watch('src/*.php').on('change', browserSync.reload);
});

gulp.task('default', ['serve']);