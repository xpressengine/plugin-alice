var gulp = require('gulp')
var $ = require('gulp-load-plugins')()
var runSequence = require('run-sequence')
var autoprefixer = require('gulp-autoprefixer')

var config = {
  isProduction: !!$.util.env.production,
  useSourceMaps: !$.util.env.production
}

gulp.task('default', function (callback) {
  runSequence(
    'sass',
    callback)
})

gulp.task('sass', function () {
  return gulp.src('./theme/assets/css/src/*.scss')
    .pipe($.if(config.useSourceMaps, $.sourcemaps.init()))
    .pipe($.plumber())
    .pipe($.sass({outputStyle: 'compressed'}).on('error', $.sass.logError))
    .pipe(autoprefixer({
      browsers: [
        'last 2 versions'
      ],
      cascade: false
    }))
    .pipe($.if(config.useSourceMaps, $.sourcemaps.write('.')))
    .pipe(gulp.dest('./theme/assets/css'))
})

gulp.task('watch', function () {
  gulp.watch('**/*.scss', ['sass'])
})
