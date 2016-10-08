var gulp = require('gulp'),
    sass = require('gulp-sass')
notify = require("gulp-notify")
bower = require('gulp-bower');

var config = {
    sassPath: './assets/sass',
    bowerDir: './bower_components'
}

gulp.task('bower', function() {
    return bower()
        .pipe(gulp.dest(config.bowerDir))
});

gulp.task('icons', function() {
    return gulp.src(config.bowerDir + '/bootstrap/fontawesome/fonts/**.*')
        .pipe(gulp.dest('./assets/fonts'));
});

gulp.task('css', function() {
    return gulp.src(config.sassPath + '/style.scss')
        .pipe(sass({
            style: 'compressed',
            loadPath: [
                './assets/sass',
                config.bowerDir + '/bootstrap-sass-official/assets/stylesheets',
                config.bowerDir + '/fontawesome/scss'
            ]
        })
            .on("error", notify.onError(function (error) {
                return "Error: " + error.message;
            })))
        .pipe(gulp.dest('./assets/css'));
});

gulp.task('sass', function () {
    return gulp.src('./web/assets/sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./web/assets/css'));
});

gulp.task('sass:watch', function () {
    gulp.watch('./web/assets/sass/**/*.scss', ['sass']);
});

gulp.task('default', ['bower', 'icons', 'css', 'sass:watch']);