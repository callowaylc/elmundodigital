#=============================================================================
# app details and WordPress requirements

# tags/3.5.1, branches/3.5, trunk
set :application, "elmundodigital.net"

#=============================================================================
# app source repository configuration

set :scm, :git
set :repository, "git@github.com:callowaylc/elmundodigital.git"
set :git_enable_submodules, 1
#set :git_shallow_clone, 1

#=============================================================================
# Housekeeping
# clean up old releases on each deploy
set :keep_releases, 5
#set :ssh_options, { :forward_agent => true }

 # Default branch is :master
# ask :branch, proc { `git rev-parse --abbrev-ref HEAD`.chomp }

# Default deploy_to directory is /var/www/my_app
set :deploy_to, '/home/ubuntu/Develop/elmundodigital'

# Default value for :scm is :git
set :scm,    :git

# set server user
set :user,   "ubuntu"

# deployment will be done via copy
set :deploy_via, :remote_cache

# only keep the last 5 releases
set :keep_releases, 5

#=============================================================================
# Additional Project specific directories

# Uncomment these lines to additionally create your upload and cache
# directories in the shared location when running `deploy:setup`.
#
# Modify these commands to make sure these directories are writable by
# your web server.

# after "deploy:setup" do
#   ['uploads', 'cache'].each do |dir|
#     run "cd #{shared_path} && mkdir #{dir} && chgrp www-data #{dir} && chmod 775 #{dir}"
#   end
# end