/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_open_read_close.c                               :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/20 19:59:54 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/26 21:09:46 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../include/fillit.h"

int		ft_openfile(char *argv)
{
	int		fd;

	fd = open(argv, O_RDONLY); // = index sur fichier a ouvrir (3)
	if (fd == -1)
	{
		puts("error\n");
		return (-1);
	}
	return (fd);
}

char	*ft_readfile(int fd)
{
	int		size;
	char	*buf;

	if (!(buf = (char *)malloc(sizeof(char) * BUF_SIZE + 1)))
		return (NULL);
	size = read(fd, buf, BUF_SIZE);
	buf[size] = '\0';
	if (size == -1)
	{
		puts("error\n");
		exit(0);
	}
	return (buf);
}

int		ft_closefile(int fd)
{
	if (close(fd) == -1)
	{
		puts("error\n");
		return (-1);
	}
	return (0);
}