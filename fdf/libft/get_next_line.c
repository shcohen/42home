/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   get_next_line.c                                    :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/07/16 18:19:06 by shcohen           #+#    #+#             */
/*   Updated: 2018/11/27 16:23:17 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char	*ft_read_line(const int fd, char *save)
{
	char	buf[BUFF_SIZE + 1];
	char	*tmp;
	int		lus;

	while ((lus = read(fd, buf, BUFF_SIZE)) > 0)
	{
		buf[lus] = '\0';
		tmp = save;
		save = ft_strjoin(save, buf);
		if (tmp)
			free(tmp);
		if (ft_strchr(save, '\n'))
			break ;
	}
	if (lus == -1)
		return (0);
	return (save);
}

int		ft_fill_line(char **line, char **save, int i)
{
	char	*tmp;

	if ((*save)[i] != '\n')
		i++;
	else if ((*save)[i] == '\n')
	{
		*line = ft_strsub(*save, 0, i);
		tmp = *save;
		*save = ft_strsub(*save, i + 1, ft_strlen(*save));
		if (tmp)
			free(tmp);
		return (-1);
	}
	return (i);
}

int		get_next_line(const int fd, char **line)
{
	static char	*save = 0;
	int			i;

	if (fd < 0 || !line || BUFF_SIZE < 0)
		return (-1);
	i = 0;
	if (!save)
		save = ft_strdup("");
	if (!ft_strchr(save, '\n'))
		save = ft_read_line(fd, save);
	if (!save)
		return (-1);
	while (save && save[i])
		if ((i = ft_fill_line(line, &save, i)) == -1)
			return (1);
	*line = save;
	save = 0;
	return (!(!i));
}
