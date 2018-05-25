var gulp = require('gulp');
var browserSync = require('browser-sync');
var reload = browserSync.reload;

// Html task
gulp.task('html', function(){
	gulp.src(['application/views/*.php','application/controllers/*.php'])
	.pipe(reload({stream:true}))
})

// Browser task
gulp.task('browser-sync', function() {
	browserSync.init({
		proxy : 'http://localhost/e-order',
	});
});

// Watch task
gulp.task('watch', function(){
	gulp.watch(['application/views/*.php','application/controllers/*.php','assets/css/*.css','assets/js/index.js'], ['html'])
});

gulp.task('default', ['html', 'browser-sync', 'watch']);
